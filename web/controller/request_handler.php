<?php


class Request_handler {

    function book_search($requested_books) {

       //TODO check for sql injection
        //TODO get rid of accent characters
        //TODO parse search request

        $search = new Sql_comm();
        $raw_results = $search->search_books("$requested_books");

        return $raw_results;
    }
}

