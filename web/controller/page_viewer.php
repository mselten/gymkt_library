<?php


class Page_viewer {
   var $template_type = '';
   var $title = "Gymkt - knihovna";
   var $found_books = "empty";  //DO NOT delete empty word - it would mess results printing


    function view_page($template_type) {
        $this->template_type = $template_type;

        require "view/basic_layout.phtml";
    }

}