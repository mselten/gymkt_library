<?php


class Sql_comm {

    var $dsn = "mysql:host=127.0.0.1;dbname=gymkt_library;charset=utf8";
    var $name = "library_php";
    var $password = "mlavek79";


   function search_books($request) {
       $pdo = new PDO($this->dsn, $this->name, $this->password);
       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
       $search_query = "SELECT section, location, record_number, year, price, author_surname, author_first_name, name, name_2 from books 
                        WHERE CONCAT_ws (author_surname, author_first_name, name, name_2) LIKE \"%$request%\"";

       $books = $pdo->query($search_query)
           ->fetchAll();

       return $books;
    }


}
