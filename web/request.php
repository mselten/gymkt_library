<?php

require "controller/book_browser.php";
require "controller/page_viewer.php";
require "controller/database.php";


$book_browser = new Book_browser();
$page_viewer = new Page_viewer();


if ($_POST["search_book"]) {

    //view the results and the search bar
    $page_viewer->found_books = $book_browser->book_search($_POST["search_book"]);
    $page_viewer->view_page("main_page");

} else {
    $page_viewer->found_books = "empty_entry";
    $page_viewer->view_page("main_page");

}
