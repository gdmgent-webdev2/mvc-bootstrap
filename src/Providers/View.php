<?php

// https://pastebin.com/KsJJK6jr

namespace Src\Providers;

use Exception;

class View
{
    public static function load($view_path, $view_name, $data)
    {
        extract($data);

        if (file_exists($view_path . $view_name)) {
            ob_start();
            include($view_path . $view_name);
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
        throw new Exception("View does not exist: " . $view_path . $view_name);
    }

    public static function render($view_name, $data = null)
    {
        $ext = '.php';
        $view_file = $view_name . $ext;
        return self::load(VIEWPATH, $view_file, $data);
    }
}
