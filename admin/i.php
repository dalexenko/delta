<?php

if (!isset($_SERVER['PHP_AUTH_USER']))

{
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} 
else 
{
include('../includes/func.inc');

$query = "select * from users where user='".$_SERVER['PHP_AUTH_USER']."' and pass='".$_SERVER['PHP_AUTH_PW']."'"; 
$result = mysql_query($query, $conn);
$nrows=mysql_num_rows($result);

if ($nrows>0)
{
echo "<frameset rows='*' cols='180,*' frameborder='NO' border='0' framespacing='0'><frame src='menu.htm' name='left' scrolling='NO' noresize><frameset rows='80,*' frameborder='NO' border='0' framespacing='0'><frame src='top.htm' name='top' scrolling='NO' noresize><frame src='main.htm' name='main'></frameset> </frameset>
";
}
else
{
echo "bla-bla";
}

}
?>












