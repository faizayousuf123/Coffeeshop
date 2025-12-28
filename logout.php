<?php
session_start();

if(isset($_SESSION['register']))
{
unset($_SESSION['register']);
unset($_SESSION['login']);
$_SESSION['message']=['logout sucessfully'];

}
header("Location: index.php");
exit();
?>
