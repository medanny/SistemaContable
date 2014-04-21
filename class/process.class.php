<?php
/**
 * Process.php
 * 
 * Esta clase cumple con el trabajo de procesar todas las formas.
 * */
include("session.class.php");
class Process
{
   /* Constructor de clase */
   function Process(){
      global $session;
      /* Log in */
      if(isset($_POST['login'])){
         $this->login();
      }
      // log out
      if(isset($_GET["logout"])){
        $this->Logout();
        echo "ACTIVO";
      }
     
      
      /**
       * Nunca deveriamos de llegar asta aqui pero en caso regresar al index.
       */
       else{
          header("Location: ../index.php");
       }
   }

   //Funcion Login, manda a llamar la clase session y manda las variables
   function login(){
      global $session;
      /* Intentar Iniciar session manando a Session usuario y contrasena*/
      $retval = $session->login($_POST['user'], $_POST['pass']);
      
      /* Se pudo iniciar session mandar a main.php*/
      if($retval){
         header("Location:../main.php");
        //echo "LOGIN!";
      }
      /* no se pudo iniciar session */
      else{
         header("location:../index.php?error=2");
      }
   }
   
   /**
    * Logout()- Terminar Session y regresa a index.php para poder iniciar
    * session de nuevo.
    */
   function Logout(){
      global $session;
      $retval = $session->logout();
      header("Location: ../index.php?logout");
   }
   
   
   
  
};

/* iniciar Clase */
$process = new Process;
?>