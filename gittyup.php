<?PHP

class GittyUp{
	
	public function get_form( $message ){
		
		$out[] = '<form method="post">';
		$out[] = '<label>Git Username</label>';
		$out[] = '<input type="text" name="gituser"/>';
		$out[] = '<label>Git Password</label>';
		$out[] = '<input type="password" name="gitpass"/>';
		$out[] = '<button type="submit">Pull Git Repo</button>';
		$out[] = '</form>';
		$out[] = '<p>'.$message.'</p>';
		return implode( "\n", $out );
		
	}
	
	public function set_form( $values ){
		
		$username = $values['gituser'];
		$password = $values['gitpass'];
		//Pulling to the staging server
		chdir( WEB_ROOT );
		$command = 'git pull '.$username.':'.$password.'/github.com/codeforabq/circles.git';
		$stuff = exec( $command );
		return $stuff;
		
	}
	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gitty Up</title>
	</head>
	<body>
		<?PHP
			$g = new GittyUp;
			$message = '';
			if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
				$message = $g->set_form( $_POST );
			}
			echo $g->get_form( $message );
		?>
	</body>
</html>
