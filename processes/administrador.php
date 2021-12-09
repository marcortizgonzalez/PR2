<?php 
class Usuario{
   public $nombre;
   public $email; 
   public $pass; 
   public $telf;
   public function __construct($nombre,$email,$pass,$telf){
      $this->email=$email;
      $this->nombre=$nombre;
      $this->pass=$pass;
      $this->telf=$telf;
   }

}