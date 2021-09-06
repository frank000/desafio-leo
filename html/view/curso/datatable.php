<?php
$ativo = ModelAbstract::ATIVO;
if(isset($_GET['ativo']))
{
    $ativo =  $_GET['ativo'] == '0' ? ModelAbstract::INATIVO : ModelAbstract::ATIVO ;
}

?>
<div class="relative overflow-hidden m-14">
    <div class="flex justify-center rounded-t-lg overflow-hidden border-t border-l border-r border-gray-400 p-4">
        <div><h1>Desafio Leo learning</h1></div> -
        <div><h1>Cursos</h1></div>
    </div>
    SELECIONE:
    <div class="text-blue-700 text-sm  justify-center overflow-hidden border-l border-r border-gray-400 p-4">
        <?php if($ativo == ModelAbstract::ATIVO):?>
            <a href="/index.php?ativo=0">Mostrar Inativos</a>
        <?php else:?>
            <a href="/index.php?ativo=1">Mostrar Ativos</a>
        <?php endif;?>

    </div>
    <div class="flex justify-center  rounded-t-lg overflow-hidden border-t border-l border-r border-gray-400 ">
        <table class="table-auto jus">
            <thead>
            <tr>
                <th class="px-4 py-2">Imagem</th>
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Descrição</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $curso = new Curso();

            foreach ($curso->getByAll(['status' => $ativo]) as $i => $obj):?>
                <tr class="<?= ($i % 2  == 0 ) ? 'bg-gray-100' : ''?>" >
                    <td class="border px-4 py-2">
                        <section class="item brochure">
                            <div class="Enlarge">
                                <img width="50wv" src="./imagens/<?=  $obj->imagem ?>">
                                <div class="expandedImage"><img width="200px" src="./imagens/<?=  $obj->imagem ?>"></div>
                            </div>
                        </section>
                    </td>
                    <td class="border px-4 py-2">
                        <?=  $obj->nome ?>
                    </td>
                    <td class="border px-4 py-2"><?=  $obj->descricao ?></td>
                    <td class="border px-4 py-2 text-pink-700">
                        <a href="/cadastrar.php?acao=editar&id=<?=  $obj->id ?>">Editar</a>
                        <?php if($ativo == ModelAbstract::ATIVO):?>
                            <a href="/cadastrar.php?acao=deletar&id=<?=  $obj->id ?>">| Deletar</a>
                        <?php else:?>

                        <?php endif;?>
                    </td>
                </tr>
            <?endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="flex justify-center  rounded-lg overflow-hidden border border-gray-400 ">
        <div>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
               href="/cadastrar.php">Cadastrar Curso</a>
        </div>
    </div>
</div>
<style>
    .Enlarge {
        position:relative;

        overflow:visible;
    }
    .Enlarge .expandedImage {
        position:fixed;
        display:none;
        white-space:nowrap;

        width:600px;
        height:300px;
        z-index:10000;
        pointer-events:none;
    }
</style>
<script>
    $(document).ready(function() {
        $('.Enlarge').mouseenter(function(){
            $(this).find('.expandedImage').show();
            var container = $(this);
            var containerOffset = container.offset();
            var largeImage = container.find('.expandedImage');
            $(container).on('mousemove.imageFollow', function(event){
                var left = event.pageX - containerOffset.left + 5;
                var top = event.pageY - containerOffset.top  + 5;
                if(event.clientX + largeImage.width() + 5 >= $(window).width())
                    left = $(window).width() - largeImage.width() - containerOffset.left -2;
                if(event.clientY + largeImage.height() + 5 >= $(window).height())
                    top = $(window).height() - largeImage.height() - containerOffset.top -2;
                largeImage.css('left', left).css('top', top);
            });
        }).mouseleave(function(){
            $(this).off('mousemove.imageFollow');
            $(this).closest('.Enlarge').find('.expandedImage').hide();
        });
    });
</script>