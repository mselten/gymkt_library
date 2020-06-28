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


        $sorted_results = array();
        $max_value = 0;
        for ($match_type = 0; $match_type < 2; $match_type++) { // determine match type - if we gonna use exact match_type or LIKE clause
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
                   $value = 2 * (count($parsed_words) - ($match_counter + 1)) + $match_type;
                   $max_value = $value >= $max_value ? $value : $max_value;
                   if (isset($sorted_results[$value]))
                       $sorted_results[$value][count($sorted_results[$value])] = $raw_search[$i][$match_type][$j];
                   else
                       $sorted_results[$value][0] = $raw_search[$i][$match_type][$j];
                }
            }
        }
        //echo '<pre>' . var_export($sorted_results, true) . '</pre>';

        $formatted_results = array();
        $book_counter = 0;
        for ($i = 0; $i < $max_value + 1; $i++) {
            if (isset($sorted_results[$i])) {
                for ($j = 0; $j < count($sorted_results[$i]); $j++) {
                    $formatted_results[$book_counter] = $sorted_results[$i][$j];
                    $book_counter++;
                }
            }
        }
        $formatted_results = array_map("unserialize", array_unique(array_map("serialize", $formatted_results)));
        return $formatted_results;

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
    	$no_special_char = preg_replace('/[^A-Za-z0-9áčďéěíňóřšťúůýžľüöÁČĎÉĚÍŇÓŘŠŤÚŮÝŽĽÜÖß]/', '-', $requested_books);
    	$no_multiple_hyphens = preg_replace('/-+/', '-', $no_special_char);
    	$no_multiple_hyphens = trim($no_multiple_hyphens, "-");
    	$parsed_words = explode('-', $no_multiple_hyphens);
    	return $parsed_words;
    }
}

