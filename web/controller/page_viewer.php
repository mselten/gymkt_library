<?php


class Page_viewer {
   var $template_type = '';
   var $title = "Gymkt - knihovna";
   var $found_books = '';


    function view_page($template_type) {
        $this->template_type = $template_type;

        require "view/basic_layout.html";
    }

}