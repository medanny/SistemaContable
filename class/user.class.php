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
      /* Error occurred, return given name by default */
      if(!$result || (mysql_numrows($result) < 1)){
         return NULL;
      }
      /* Return result array */
      $dbarray = mysql_fetch_array($result);
      return $dbarray;
   }

   function confirmUserPass($username, $password){
      global $database;
      /* Verify that user is in database */
      $result=$database->selectField("usuario","username",$username);
      if(!$result || (mysql_numrows($result) < 1)){
         return 1; //Indicates username failure
      }

      /* Retrieve password from result, strip slashes */
      $dbarray = mysql_fetch_array($result);
      /* Validate that password is correct */
      if($password == $dbarray['password']){
         return 0; //Success! Username and password confirmed
      }
      else{
         return 2; //Indicates password failure
      }
   }

   function setEjercisio($id,$user_id){
   global $database;
   $database->updateField("usuario", "ultimo_ejercisio", $id, "id", $user_id);

   }
     
  };

  $user = new User;

  ?>
