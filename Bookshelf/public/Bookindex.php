<?php
    $booklist = [['id'=>1, 'title' => 'Community of the Ring', 'author' => 'J.R.R. Tolkien', 'published' => 1957'],
                 ['id' => 2, 'title' => 'The Two Towers', 'author => 'J.R.R. Tolkien', 'published' =>1957'],
                 ['id' => 3, 'title' => 'The Return of the King', 'author' => 'J.R.R Tolkien', 'published' => 1957']];
    
    echo '<h1>index des livres</h1> <ul>';
    foreach($booklist as $books) {
        echo '<li><p> Book: title: ' . $books['title'] . ', author: ' . $books['author'] . ', published: ' . $books['published'] . '<p></li>';

    }
    echo '</ul>';
    
?>