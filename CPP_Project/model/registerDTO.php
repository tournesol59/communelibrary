<?php

namespace model;

class registerDTO {

   public int $id;
   public string $uname;
   public string $email;
   public string $publication;
   public string $birthdate;
   public string $useroption;
   public string $password;
   public string $contact;
   public string $city;

   // validation var
   public string $errorMessage;

   public function __construct() {
      $this->errorMessage = '';
      var_dump($_POST['uname']);
      $this->validate();
   }

   public function validate() : void {
      if ((isset($_POST['uname'])) && !($_POST['uname'] == '')) {
         $this->uname = $_POST['uname'];
      }
      else {
         $this->errorMessage = 'You don t have entered a lastname';
      }
      if (isset($_POST['email']) && !($_POST['email'] == '')) {
         $this->email = $_POST['email'];
      }
      else {
         $this->errorMessage = 'You don t have entered a mail address';
      }
      if ((isset($_POST['publication'])) && !($_POST['publication'] == '')) {
         $this->publication = $_POST['publication'];
      }
      else {
         $this->errorMessage = 'You don t have entered a personnal emphasis/topic';
      }
      if ((isset($_POST['birthdate'])) && !($_POST['birthdate'] == '')) {
         $this->birthdate = $_POST['birthdate'];
      }
      else {
         $this->errorMessage = 'You don t have entered a lastname';
      }
      if ((isset($_POST['option'])) && !($_POST['option'] == '')) {
         $this->option = $_POST['option'];
      }
      else {
         $this->errorMessage = 'You don t have entered your master option';
      }
      if ((isset($_POST['password'])) && !($_POST['password'] == '') && (isset($_POST['repassword'])) && !($_POST['repassword'] == '') && ($_POST['password'] == $_POST['repassword']) )  {
         $this->password = $_POST['password'];
      }
      else {
         $this->errorMessage = 'You don t have entered two matching password';
      }
      if ((isset($_POST['contact'])) && !($_POST['contact'] == '')) {
         $this->contact = $_POST['contact'];
      }
      else {
         $this->errorMessage = 'You don t have selected if you want to be the contact role';
      }
      if ((isset($_POST['cityaddress'])) && !($_POST['cityaddress'] == '')) {
         $this->city = $_POST['cityaddress'];
      }
      else {
         $this->errorMessage = 'You don t have entered your address town';
      }
   }

}
?>
