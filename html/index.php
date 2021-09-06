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
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8" />
    <title>Desafio-leo</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<?php

$curso = new Curso();
foreach ($curso->getByAll() as $obj):
?>
    <p><?=  $obj->nome ?></p>
<?endforeach ?>
<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
   href="/cadastrar.php">Cadastrar Curso</a>

</body>
</html>