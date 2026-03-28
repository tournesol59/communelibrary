<?php

class publicationDTO {

   public int id;
   public int userid;
   public string title;
   public string slug;
   public bool epublic;
   public string publicdate;
   public string siteurl;
   
   // validation var
   public string $errorMessage;
   
   public function __construct($data) : void {
      $errorMessage = '';
	  $this->id = $data['id'];
	  $this->userid = $data['userid'];
	  $this->title = $data['title'];
	  $this->slug = $data['slug'];
	  $this->epublic = ($data['public']===1?) true : false;
      $this->siteurl = $data['siteurl'];
	  //  $this->validate();
   }
   
   public function validate() : void {
	   // in development: for creating form of a new publication, complete this as in registerDTO
      $this->errorMessage = 'not complete, TBC';		  
   }
}
   
?>