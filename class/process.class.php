<?php
/**
 * Process.php
 * 
 * Esta clase cumple con el trabajo de procesar todas las formas.
 * */
include("session.class.php");
include("ejercisio.class.php");
include("catalogos.class.php"); 
//include("catalogos.class.php");


class Process
{
   /* Constructor de clase */
   function Process(){
      global $session;
      /* Prosesar formas */
      if(isset($_POST['login'])){
         $this->login();
      }
      if(isset($_GET['timeout'])){
        $this->timeout();
        //echo "TIMEOUT!";
      }
      if(isset($_GET["logout"])){
        $this->Logout();
      }
      if(isset($_GET["ejer_ins"])){
        $this->ejer_ins();
      }
      if(isset($_GET["cuenta_ins"])){
        $this->cuenta_ins();
      }
      if(isset($_GET["set_ejer"])){
        $this->set_ejer();
      }
      
      /**
       * Should not get here, which means user is viewing this page
       * by mistake and therefore is redirected.
       */
      
   }

   
   function login(){
      global $session;
      /* Login attempt */
      $retval = $session->login($_POST['user'], $_POST['pass']);
      
      /* Login successful */
      if($retval){
         header("Location:../main.php");
        //echo "LOGIN!";
      }
      /* Login failed */
      else{
         header("location:../index.php?error=2");
         //echo "wrong something.";
      }
   }
   
   function Logout(){
      global $session;
      $retval = $session->logout();
      header("Location: ../index.php?logout");
   }

   function timeout(){
      global $session;
      $nom_usuario=$_SESSION['username'];
      $session->logout();
      header("Location: ../timeout.php?user=$nom_usuario");
   }

   function set_ejer(){
   global $session;
   $session->setEjersio($_GET['set_ejer']);
   header("Location: ../main.php");
   }
   function ejer_ins(){
      global $ejercisio;
      $ejercisio->insEjercisio($_POST['nom_Empresa'],$_POST['descripcion'],$_POST['rfc'],$_POST['direccion'],$_POST['telefono']);
      header("Location: ../main.php?ejercisios");
   }
   function cuenta_ins(){
      global $catalogo;
      $catalogo->insCuenta($_POST['nombre'],$_POST['descripcion'],$_POST['tipo'],$_POST['ejercisio']);
    //  header("Location: ../main.php");
   }
   
  
};

/* Initialize process */
$process = new Process;
?>