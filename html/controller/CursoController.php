<?php
$data = null;
if(isset($_REQUEST['acao']) && !empty($_REQUEST['acao']))
{
    $curso = isset($_POST['curso']) ? $_POST['curso'] : [];
    $obj = new Curso();
    switch ($_REQUEST['acao'])
    {
        case 'salvar':
            if(!$obj->save($curso))
            {
                Utils::redirect(false);
            }
            else
            {
                Utils::redirect(true);
            }
            break;
        case 'editar':
            $data = $obj->getById($_REQUEST['id']);
            break;
        default:

    }

}


?>