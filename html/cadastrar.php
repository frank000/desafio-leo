<?php
spl_autoload_register(function ($className) {
    $extension =  spl_autoload_extensions();
    require_once (__DIR__ . '/Vendor/' . $className . '.php');
}
);
include __DIR__ .'/controller/CursoController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8" />
    <title>Desafio-leo</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<div class="flex justify-center rounded-t-lg overflow-hidden border-t border-l border-r border-gray-400 p-4">
    <div><h1>Formulário</h1></div>

</div>
<div  class=" m-14 rounded-t-lg overflow-hidden border border-gray-400 flex justify-center p-8">
    <form class="w-full max-w-lg" method="post">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="curso[nome]">
                    Nome
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="curso[nome]" name="curso[nome]"  value="<?= (!is_null($data)) ? $data->getNome() : '' ?>" type="text" placeholder="Php">
                <p class="text-red-500 text-xs italic">Preencha com nome do curso</p>
            </div>

        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="curso[descricao]">
                    Descrição
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       id="curso[descricao]" value="<?= (!is_null($data)) ? $data->getDescricao() : '' ?>" name="curso[descricao]" type="text" >
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="curso[vagas]">
                    Quantidade de vagas
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       min="0" id="curso[vagas]"  value="<?= (!is_null($data)) ? $data->getVagas() : '' ?>" name="curso[vagas]" type="number">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="curso[vagas_preenchidas]">
                    Quantidade de vagas preenchidas
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="curso[vagas_preenchidas]"  name="curso[vagas_preenchidas]"  value="<?= (!is_null($data)) ? $data->getVagasPreenchidas() : '' ?>" type="number" min="0">
             </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="curso[inicio]">
                    Data de início
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="curso[inicio]"  name="curso[inicio]"  value="<?= (!is_null($data)) ? $data->getInicio() : '' ?>" type="date">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="curso[fim]">
                    Fim
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="curso[fim]" name="curso[fim]"  value="<?= (!is_null($data)) ? $data->getFim() : '' ?>" type="date">
            </div>
        </div>
        <div class="md:flex md:items-center">
                <input name="curso[id]" value="<?= (!is_null($data)) ? $data->getId() : '' ?>" type="hidden">
                <input name="acao" value="<?= (!is_null($_GET['acao']) && $_GET['acao'] == 'editar' ) ? 'editar' : 'salvar' ?>" type="hidden">
                <div class="md:w-1/3">
                    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        <?= (!is_null($_GET['acao']) && $_GET['acao'] == 'editar' ) ? 'Editar' : 'Cadastrar' ?> Curso
                    </button>
                </div>
                <div class="md:w-2/3">
                    <a href="/" class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                        Voltar
                    </a>
                </div>
            </div>


    </form>

</div>


</body>
</html>