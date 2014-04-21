  <?php
  /**
   * session.php
   * 
   * Esta clase se encarga de administrar todas las funciones de usuarios.
   */

  include("user.class.php");
        
        
  class Session//Inicio de clase
  {
      var $user;     //Usuario
      var $password;       //Contrasena
      var $name;    //nombre
      var $id;         //id
      var $lvl;          //nivel
      var $logged_in;    //Verdadero o Falso
      var $userinfo = array();  //Array con toda la informacion del usuario
      
      function Session(){
        $this->startSession();
            }

     function startSession(){
        global $database;  //Conexion a la base de datos
        session_start();   //Iniciar Session con PHP
        
        $this->logged_in = $this->checkLogin();
      }
      
      function checkLogin(){
        global $database,$user;
      
        if(isset($_SESSION['username']) && isset($_SESSION['id'])){
           if($user->confirmUserID($_SESSION['username'], $_SESSION['id']) != 0){
             unset($_SESSION['username']);
              unset($_SESSION['userid']);
              return false;
           }
           
           $this->userinfo  = $user->getUserInfo($_SESSION['username']);
           $this->username  = $this->userinfo['username'];
           $this->userid    = $this->userinfo['id'];
           $this->userlevel = $this->userinfo['lvl'];
           return true;
        }
        /* el usuario no a iniciado session */
        else{
           return false;
        }
     }

      function logout(){ 
     
      /* Eliminar variables de session */
      unset($_SESSION['username']);
      unset($_SESSION['id']);

      /* reflejar que el usuario no a iniciado */
      $this->logged_in = false;
   }

     function login($subuser, $subpass){
      global $database,$user;  
      $result = $user->confirmUserPass($subuser, md5($subpass));

      if($result == 1){
         $field = "user";
      }
      else if($result == 2){
         $field = "pass";
      }
      
      if($result>=1){
         return false;
      }

      /* Usuario y contrasena son correcotos, registrar variables de session */
      $this->userinfo  = $user->getUserInfo($subuser);
      $this->username  = $_SESSION['username'] = $this->userinfo['username'];
      $this->userid    = $_SESSION['id']   = $this->userinfo['id'];
      $this->userlevel = $this->userinfo['lvl'];
      
         /* A iniciado session*/
      return true;
   }

   

     
  



     
  };


  $session = new Session;

  ?>