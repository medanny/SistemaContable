  <?php
  /**
   * session.php
   * 
   * Esta clase se encarga de administrar todas las funciones de usuarios.
   */

  include("user.class.php");
        
        
  class Session//Inicio de clase
  {
      var $username;     //Usuario
      var $password;       //Contrasena
      var $name;    //nombre
      var $userid;         //id
      var $userlevel;          //nivel
      var $logged_in;    //Verdadero o Falso
      var $id_ejercisio; // La id del ejercisio selecionado
      var $userinfo = array();  //Array con toda la informacion del usuario
      
      function Session(){
        $this->startSession();
            }

     function startSession(){
        global $database;  //The database connection
        session_start();   //Tell PHP to start the session
        
        $this->logged_in = $this->checkLogin();
      }
      
      function checkLogin(){
        global $database,$user;  //The database connection
        
        /* Username and userid have been set and not guest */
        
        
        if(isset($_SESSION['username']) && isset($_SESSION['id'])){
           /* Confirm that username and userid are valid */

           if($user->confirmUserID($_SESSION['username'], $_SESSION['id']) != 0){
              /* Variables are incorrect, user not logged in */
              unset($_SESSION['username']);
              unset($_SESSION['userid']);
              return false;
           }
           /* User is logged in, set class variables */
           $this->userinfo  = $user->getUserInfo($_SESSION['username']);
           $this->username  = $this->userinfo['username'];
           $this->userid    = $this->userinfo['id'];
           $this->userlevel = $this->userinfo['lvl'];
           $this->id_ejercisio = $this->userinfo['ultimo_ejercisio'];
           return true;
        }
        /* User not logged in */
        else{
           return false;
        }
     }

      function logout(){  //The database connection
     
      /* Unset PHP session variables */
      unset($_SESSION['username']);
      unset($_SESSION['id']);

      /* Reflect fact that user has logged out */
      $this->logged_in = false;
   }
   function setEjersio($id){  //The database connection
   global $user;
   $_SESSION['id_ejercisio']=$id;
   $this->id_ejercisio = $id;
   $id_user=$_SESSION['id'];
   $user->setEjercisio($id,$id_user);
   }
   
   function getEjersio(){  //The database connection
   global $user;
   $content=getUserInfo($_SESSION['username']);
   return $content['ultimo_ejercisio'];
   }

   function login($subuser, $subpass){
      global $database,$user;  

      ;  //The database and form object
      $result = $user->confirmUserPass($subuser, md5($subpass));

      /* Check error codes */
      if($result == 1){
         $field = "user";
      }
      else if($result == 2){
         $field = "pass";
      }
      
      /* Return if form errors exist */
      if($result>=1){
         return false;
      }

      /* Username and password correct, register session variables */
      $this->userinfo  = $user->getUserInfo($subuser);
      $this->username  = $_SESSION['username'] = $this->userinfo['username'];
      $this->userid    = $_SESSION['id']   = $this->userinfo['id'];
      $this->userlevel = $this->userinfo['lvl'];
      $this->id_ejercisio = $_SESSION['id_ejercisio']=$this->userinfo['ultimo_ejercisio'];
      
      
         /* Login completed successfully */
      return true;
   }

   

     
  



     
  };


  $session = new Session;

  ?>