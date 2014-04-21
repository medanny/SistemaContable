  <?php
  /**
   * User.php
   * 
   * Esta clase se encarga de administrar todas las funciones de usuarios.
   */

  // incluir archivo con todas las variables necesarias

  include("database.class.php");
        
  class User//Inicio de clase
  {
     
     function addUser($user,$password,$deparment){
      global $database; 
      $password=md5($password);
      $database->insertValues("users","(NULL,'$user','$password','$deparment')");
      return "El usuario a $user a sido agregado.";

     }  
     
     function confirmUserID($user,$id){
      global $database;
      $result=$database->selectField("usuario", "username", $user);
       if(!$result || (mysql_numrows($result) < 1)){
           
           return 1; //No se encontro el usuario en la base de datos.
        }
        
        $dbarray = mysql_fetch_array($result);
        /* Validar que el usuario y id sean validas */
        if($id == $dbarray['id']){
           return 0; //son correctos
        }
        else{
           return 2; //ID invalida
        }
     }

     
     function getUserInfo($username){
      global $database;

      $q = "SELECT * FROM usuario WHERE username = '$username'";
      $result = $database->query($q);
      if(!$result || (mysql_numrows($result) < 1)){
         return NULL;
      }
      $dbarray = mysql_fetch_array($result);
      return $dbarray;
   }

   function confirmUserPass($username, $password){
      global $database;
      $result=$database->selectField("usuario","username",$username);
      if(!$result || (mysql_numrows($result) < 1)){
         return 1; 
      }

      $dbarray = mysql_fetch_array($result);
      if($password == $dbarray['password']){
         return 0;
      }
      else{
         return 2;
      }
   }
     
  };

  $user = new User;

  ?>
