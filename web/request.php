<?php

require "controller/request_handler.php";
require "controller/page_viewer.php";


$request_handler = new Request_handler();


if ($_POST["search_book"]) {
    //TODO user input check

    $request_handler->requested_book = $_POST["search_book"];
    //TODO search in database

    //view the results and the search bar
    $page_viewer = new Page_viewer();
    $page_viewer->found_books = $request_handler->requested_book;
    $page_viewer->view_page("view/book_search_results.html");



}
