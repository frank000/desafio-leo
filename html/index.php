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
<?php include __DIR__ . '/view/curso/datatable.php'?>


</body>
</html>