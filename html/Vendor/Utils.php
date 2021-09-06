<?php
class Utils
{
    public static function redirect($result = false)
    {
        if($result)
        {
            header("Location: /index.php?result=sucess");
        }
        else
        {
            header("Location: /index.php?result=fail");
        }
    }
}
