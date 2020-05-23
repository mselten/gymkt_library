<?php

require "controller/request_handler.php";
require "controller/page_viewer.php";
require "controller/sql_comm.php";


$request_handler = new Request_handler();
$page_viewer = new Page_viewer();


if ($_POST["search_book"]) {


    //view the results and the search bar
    $page_viewer->found_books = $request_handler->book_search($_POST["search_book"]);
    $page_viewer->view_page("main_page");

} else {
    $page_viewer->found_books = "empty_entry";
    $page_viewer->view_page("main_page");

}
