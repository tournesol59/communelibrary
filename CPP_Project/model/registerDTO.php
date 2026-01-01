<?php

public class registerDTO {

   public int id;
   public string name;
   public string email;
   public string publication;
   public string birthdate;
   public string useroption;
   public string password;
   public string contact;
   public string city;

   // validation var
   public string $errorMessage;

   public function __construct() : void {
      $errorMessage = '';
      $this->validate();
   }

   public function validate() : void {
      if (isset($_POST['name']) && !($_POST['name'] == '') {
         $this->name = $_POST['name'];
      }
      else {
         $errorMessage = 'You don t have entered a lastname';
      }
      if (isset($_POST['email']) && !($_POST['email'] == '') {
         $this->email = $_POST['email'];
      }
      else {
         $errorMessage = 'You don t have entered a mail address';
      }
      if (isset($_POST['publication']) && !($_POST['publication'] == '') {
         $this->publication = $_POST['publication'];
      }
      else {
         $errorMessage = 'You don t have entered a personnal emphasis/topic';
      }
      if (isset($_POST['birthdate']) && !($_POST['birthdate'] == '') {
         $this->birthdate = $_POST['birthdate'];
      }
      else {
         $errorMessage = 'You don t have entered a lastname';
      }
      if (isset($_POST['option']) && !($_POST['option'] == '') {
         $this->option = $_POST['option'];
      }
      else {
         $errorMessage = 'You don t have entered your master option';
      }
      if (isset($_POST['password']) && !($_POST['password'] == '') && isset($_POST['repassword']) && !($_POST['repassword'] == '') && ($_POST'[password'] == $_PST['repassword']) )  {
         $this->password = $_POST['password'];
      }
      else {
         $errorMessage = 'You don t have entered two matching password';
      }
      if (isset($_POST['contact']) && !($_POST['contact'] == '') {
         $this->contact = $_POST['contact'];
      }
      else {
         $errorMessage = 'You don t have selected if you want to be the contact role';
      }
      if (isset($_POST['city']) && !($_POST['city'] == '') {
         $this->city = $_POST['city'];
      }
      else {
         $errorMessage = 'You don t have entered your address town';
      }
   }

   }
?>
