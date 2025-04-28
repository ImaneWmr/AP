<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="general.css"> 
</head>
</html>
<?php
session_start(); 
$_SESSION = [];
session_destroy();
header("Location: index.php");
exit();
?>
