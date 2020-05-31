<?php


class Database {


   function search_books($request, $column, $exact_match) {
	   require "config.php";
	   $pdo = new PDO($dsn, $name, $password);
       $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $search_query = "SELECT section, location, record_number, year, price, author_surname, author_first_name, name, name_2 FROM books ";

       if($column == "all")
	        $search_query .= "WHERE CONCAT_WS(author_surname, author_first_name, name, name_2) ";
       else
            $search_query .= "WHERE $column ";


       if($exact_match)
	        $search_query .= "= CONVERT(:request USING utf8mb4) COLLATE utf8mb4_general_ci";
	   else {
	       $request = "%" . $request . "%";
           $search_query .= "LIKE CONVERT(:request USING utf8mb4) COLLATE utf8mb4_general_ci";
       }

	   //$books = $pdo->prepare("SELECT section, location, record_number, year, price, author_surname, author_first_name, name, name_2 FROM books
       //						WHERE author_surname LIKE CONVERT(\"%abe%\" USING utf8mb4) COLLATE utf8mb4_general_ci");
       $books = $pdo->prepare($search_query);
       $books->execute(array(":request" => $request));

	   $books = $books->fetchAll();

       return $books;
    }


}

