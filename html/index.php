<?php
header('Content-type: text/html; charset=utf-8');
spl_autoload_register(function ($className) {
    $extension =  spl_autoload_extensions();
    require_once (__DIR__ . '/Vendor/' . $className . '.php');
}
);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html" charset=utf-8" />
    <title>Desafio-leo</title>
</head>
<body>
<?php

$curso = new Curso();
foreach ($curso->getByAll() as $obj):
?>
    <p><?=  $obj->nome ?></p>
<?endforeach ?>
<a href="/cadastrar.php">Cadastrar Curso</a>

</body>
</html>