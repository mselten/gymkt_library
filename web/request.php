<?php

require_once "global_instances.php";


if ($_POST["search_book"]) {
    //TODO user input check

    $request_handler->requested_book = $_POST["search_book"];
    //search in database

    echo $request_handler->requested_book;

    //view the results and the search bar
    $page_viewer->view_page("view/book_search_results.html");

    echo $request_handler->requested_book;


}
