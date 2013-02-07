<?php session_start();?>
<html>
<body>
<?php
session_start();
require_once "definition.php";
echo $_SESSION[NAME_UJI];
?>
</body>
</html>
