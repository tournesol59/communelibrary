<?php

$allbooks_mock= [['id' => 1, 'title' => 'Le seigneur des anneaux', 'author' => 'Tolkien', 'published' => '1957'],
	   ['id' => 2, 'title' => 'Harry Potter a l Ecole', 'author' => 'Rowling', 'published' => '1997']];


function findBookById(int $id, array $bookscoll): array
{
   foreach($bookcolls as $book) {
     if ($id === $book['id']) {
       return $book;
     }
   }
   return null;
}

function displayBookByAuthor(string $authorName, array $books): string
{
	// la distinction se fait sur l email qu il faut envoyer c params
	// renvoie une chaine de caracteres avec le nom et l age
    foreach ($books as $book) {
        if ($authorName === $book['author']) {
            return $book['title'] . '(' . $book['author'] . ')';
        }
    }
    return 'Auteur inconnu';
}

