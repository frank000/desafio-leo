<?php
spl_autoload_register(function ($className) {
    $extension =  spl_autoload_extensions();
    require_once (__DIR__ . '/Vendor/' . $className . '.php');
}
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desafio-leo</title>
</head>
<body>
<?php

$curso = new Curso();
//print_r($curso->getById(1));
print_r($curso->getByAll(['status' => Curso::INATIVO]));
?>

<a href="/cadastrar.php">Cadastrar Curso</a>

</body>
</html>