<?php
$data = null;
if(isset($_REQUEST['acao']) && !empty($_REQUEST['acao']))
{
    $curso = isset($_POST['curso']) ? $_POST['curso'] : [];
    $obj = new Curso();
    $data = $obj->getById($_REQUEST['id']);

    switch ($_POST['acao'])
    {
        case 'salvar':
            if(!$obj->save($curso, $_FILES['imagem']))
            {
                Utils::redirect(false);
            }
            else
            {
                Utils::redirect(true);
            }
            break;
        case 'editar':
            if(!$obj->editar($curso, $_FILES['imagem']))
            {
                Utils::redirect(false);
            }
            else
            {
                Utils::redirect(true);
            }
            break;
        default:

    }
    if($_REQUEST['acao'] == 'deletar')
    {
        if(!$obj->deletar($_REQUEST['id']))
        {
            Utils::redirect(false);
        }
        else
        {
            Utils::redirect(true);
        }
    }

}


?>