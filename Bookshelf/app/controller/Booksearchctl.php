<?php

namespace app\controller;

class Booksearchctl {

    $searchtitle="";
	$searchauthor="";

	$allBooksStatic = [['id' => 1, 'title' => 'The Lord of the Rings 1: community', 'author' => 'JRR Tolkien'],
	['id' => 2, 'title' => 'The Lord of the Rings 2: two Towers', 'author' => 'JRR Tolkien'],
	['id' => 3, 'title' => 'The Lord of the Rings 3: The return of the King', 'author' => 'JRR Tolkien'],
	['id' => 4, 'title' => 'Gullivers travels', 'author' => 'J. Swift']];
	
    function __construct($stitle, $sauthor)  {
	   // TBC
	   $this->searchtitle;
	   $this->searchauthor;
	}
	
	public function searchBook() : array {
	// search book by title only for the moment
	    $results =[];
	    foreach($allBooksStatic as $book) {
			$matches=[];
			preg_match($searchtitle, $book['title'], $matches);
			if ($matches[0]) {
				array_push($results, $book);
			}
		}
		return $result;
	}
}

?>