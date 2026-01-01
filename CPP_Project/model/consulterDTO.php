<?php

public class consulterDTO {

   public int id;
   public string title;
   public string slug;
   public string thesdate;
   public string location;

   // validation var
   public string $errorMessage;

   public function __construct() : void {
      $errorMessage = '';
      $this->validate();
   }

   public function validate() : void {
      if (isset($_POST['title']) && !($_POST['title'] == '') {
         $this->title = $_POST['title'];
      }
      else {
         $errorMessage = 'You don t have entered a title';
      }
      if (isset($_POST['slug']) && !($_POST['slug'] == '') {
         $this->slug = $_POST['slug'];
      }
      else {
         $errorMessage = 'You don t have entered a slug';
      }
      else {
         $errorMessage = 'You don t have entered a personnal emphasis/topic';
      }
      if (isset($_POST['thesdate']) && !($_POST['thesdate'] == '') {
         $this->birthdate = $_POST['thesdate'];
      }
      else {
         $errorMessage = 'You don t have entered a valid date as thesaurus';
      }
      if (isset($_POST['location']) && !($_POST['location'] == '') {
         $this->city = $_POST['location'];
      }
      else {
         $errorMessage = 'You don t have entered the thesaurus location town';
      }
   }

   }
?>
