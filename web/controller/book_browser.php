<?php


class Book_browser {


    function book_search($requested_books) {
        $database = new Database();

        $parsed_words = $this->parse_request($requested_books);
        $result = array();

        foreach ($parsed_words as $word) {
            $word = $database->search_books("$word", "all", true);
            foreach ($word as $book) {
                $result[count($result) + 1] = $book;
            }
        }

        foreach ($parsed_words as $word) {
            $word = $database->search_books("$word", "all", false);
            foreach ($word as $book) {
                $result[count($result) + 1] = $book;
            }
        }

        $result = array_map("unserialize", array_unique(array_map("serialize", $result)));
        //$raw_results = $database->search_books("$requested_books", "all", false);
        //return $raw_results;

        return $result;
    }

    function parse_request($requested_books) {
    	$no_special_char = preg_replace('/[^A-Za-z0-9áčďéěíňóřšťúůýžľÁČĎÉĚÍŇÓŘŠŤÚŮÝŽĽ]/', '-', $requested_books);
    	$no_multiple_hyphens = preg_replace('/-+/', '-', $no_special_char);
    	$parsed_words = explode('-', $no_multiple_hyphens);
    	return $parsed_words;
    }
}

