<?php

namespace model;

class BookDTO {
  // public int $id;
   public string $title;
   public string $author;
   public int $published;

   public string $errorMessage;

   public function __construct() {
      $this->errorMessage = '';
      $this->validate();
   }

   public function validate() : void {
      if ((isset($_POST['title'])) && !($_POST['title'] == '')) {
         $this->title = $_POST['title'];
      }
      else {
         $this->errorMessage = 'You don t have entered a title';
      }
      if ((isset($_POST['author'])) && !($_POST['author'] == '')) {
         $this->author = $_POST['author'];
      }
      else {
         $this->errorMessage = 'You don t have entered an author';
      }
      if ((isset($_POST['published'])) && !($_POST['published'] == '')) {
         $this->published = $_POST['published'];
      }
      else {
         $this->errorMessage = 'You don t have entered a publishing date';
      }
   }

   public function toArray() : array {
      return ['title' => $this->title, 'author' => $this->author, 'published' => $this->published];
   }
}

