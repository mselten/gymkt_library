<?php


class Book_browser {


    function book_search($requested_books) {
        $database = new Database();

        //parse the request to the individual words and get rid of all special characters
        $parsed_words = $this->parse_request($requested_books);

        $raw_search = array();
        $i = 0;
        foreach ($parsed_words as $word) {  // search in database for all occurrence of the requested words
           $raw_search[$i][0] = $database->search_books("$word", "all", true);
           $raw_search[$i][1] = $database->search_books("$word", "all", false);
           $i++;
        }

         //var_dump($raw_search);

        $sorted_results = array();
        $match_type = 0; // determine match type - if we gonna use exact match_type or LIKE clause
        for ($i = 0; $i < count($raw_search); $i++) {
            for ($j = 0; $j < count($raw_search[$i][$match_type]); $j++) {
                $match_counter = 0;
               for ($k = $i+1; $k < count($raw_search); $k++) {
                   for ($l = 0; $l < count($raw_search[$k][$match_type]); $l++) {
                       if($raw_search[$i][$match_type][$j]["id"] == $raw_search[$k][$match_type][$l]["id"]) {
                           $match_counter++;
                       }
                   }
               }
               /*
               if($match_counter > 0) { //TODO test block
                   echo $raw_search[$i][1][$j]["name"];
                   echo $raw_search[$i][1][$j]["author_first_name"];
                   echo $raw_search[$i][1][$j]["author_surname"];
                   echo "<br/>";
               }
                echo $match_counter;
                echo "\n";
                echo $match_counter % count($parsed_words)+$match_type;
                echo "<br/>";
               */
                $sorted_results[$match_counter % count($parsed_words)+$match_type] = $raw_search[$i][$match_type][$j];
            }

        }


        $formated_results = array();
        //TODO format results

        return 0;






/*
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
*/
    }

    function parse_request($requested_books) {
    	$no_special_char = preg_replace('/[^A-Za-z0-9áčďéěíňóřšťúůýžľÁČĎÉĚÍŇÓŘŠŤÚŮÝŽĽ]/', '-', $requested_books);
    	$no_multiple_hyphens = preg_replace('/-+/', '-', $no_special_char);
    	$parsed_words = explode('-', $no_multiple_hyphens);
    	return $parsed_words;
    }
}

