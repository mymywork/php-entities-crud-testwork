<?php

class View
{
    function render($template, array $vars = array())
    {
        ob_start();
        extract($vars);

        // little security fix
        $template = str_replace('/', '', $template);
        $template = str_replace('\\', '', $template);
        $template = str_replace('.', '', $template);

        require_once("./view/".$template.".php");
        return ob_get_clean();
    }
}