<?php


class Book_browser {


    function book_search($requested_books) {
        $database = new Database();

        $parsed_words = $this->parse_request($requested_books);

        $result = array();

        $raw_results = $database->search_books("$requested_books", "all", false);

        return $raw_results;
    }

    function parse_request($requested_books) {
    	$no_special_char = preg_replace('/[^A-Za-z0-9áčďéěíňóřšťúůýžľÁČĎÉĚÍŇÓŘŠŤÚŮÝŽĽ]/', '-', $requested_books);
    	$no_multiple_hyphens = preg_replace('/-+/', '-', $no_special_char);
    	$parsed_words = explode('-', $no_multiple_hyphens);
    	return $parsed_words;
    }
}

