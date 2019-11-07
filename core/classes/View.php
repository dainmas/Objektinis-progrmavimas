<?php

namespace Core;

class View {

    protected $data;

    public function __construct($data = []) {
        $this->data = $data;
    }
/**
 * 
 * @param string $template_path
 * @return string HTML
 * @throws type
 */
    function render(string $template_path) {
        if (!file_exists($template_path)) {
            throw (new\Exeption("Template with file name: " . "$template_path does not exists!"));
        }

        $data = $this->data;
        ob_start();
        require $template_path;
        return ob_get_clean();
    }

}


