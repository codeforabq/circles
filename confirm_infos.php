Here ya go  . . . <br><br>

<?php
    print_r($_POST);

echo "<br><br>That was the array<br><br>And now the strings...<br><br>";

    //Or:
    foreach ($_POST as $key => $value)
        echo $key.'='.$value.'<br />';
?>