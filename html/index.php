<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desafio-leo</title>
</head>
<body>
<?php

spl_autoload_register(function ($className) {
    $extension =  spl_autoload_extensions();
    require_once (__DIR__ . '/Vendor/' . $className . '.php');
}
);

$db = Db::getInstace();
var_dump($db);
?>
</body>
</html>