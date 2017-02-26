<?PHP

include_once( 'config.php' );

class GittyUp{
	
	public function get_form( $message ){
		
		$out[] = '<form method="post">';
		$out[] = '<label>Password</label>';
		$out[] = '<input type="password" name="gitpass"/>';
		$out[] = '<button type="submit">Pull Git Repo</button>';
		$out[] = '</form>';
		$out[] = '<p>'.$message.'</p>';
		return implode( "\n", $out );
		
	}
	
	public function set_form( $values ){
		
		$password = $values['gitpass'];
		if( $password == PULL_PASSWORD ){
			chdir( WEB_ROOT );
			$command = 'git pull https://github.com/codeforabq/circles.git master';
			$stuff = exec( $command );
			return $stuff;
		}else{
			return 'NO';
		}
		
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
			include("header.php");
			$g = new GittyUp;
			$message = '';
			if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
				$message = $g->set_form( $_POST );
			}
			echo $g->get_form( $message );
		?>
	</body>
</html>
