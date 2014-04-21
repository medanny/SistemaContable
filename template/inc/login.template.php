<form class="form-signin" action="class/process.class.php" method="post">
        <h2 class="form-signin-heading">Entra</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" name="user" class="form-control" placeholder="Usuario" autofocus>
                <input type="password" name="pass" class="form-control" placeholder="Contrasena">
            </div>
                <label class="checkbox">
                <input type="hidden" name="login" value="login">
                <input type="checkbox" value="remember-me"> Recordarme
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Olvidaste tu contrasena?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Inciar Session</button>
        </div>


      </form>