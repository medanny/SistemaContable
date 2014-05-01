<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="#" class="logo">
        <img src="template/images/logo.png" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">

    <!--  notification start -->
    <ul class="nav top-menu">

         <?php
                            include("class/ejercisio.class.php"); 
                            global $ejercisio;
                            $id=$_SESSION['id_ejercisio'];
                            $content=$ejercisio->getEjercisio($id);
                            $row = mysql_fetch_array($content);
         ?>

        <?php 
        if ($_SESSION['id_ejercisio']==NULL){
            echo "<span class='label label-danger'>Selecionar Ejercisio</span>";

        }else{

        ?>
        
<button data-original-title="<?php echo $row['nom_Empresa'];?>" data-content="<?php echo $row['descripcion'];?>" data-placement="bottom" data-trigger="hover" class="btn btn-info popovers"><?php echo $row['nom_Empresa'];?></button>
        
         <?php
       }
        ?>

    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="template/images/avatar1_small.jpg">
                <span class="username"><?php echo $_SESSION["username"];?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Perfil</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Config</a></li>
                <li><a href="class/process.class.php?logout=1"><i class="fa fa-key"></i> Salir</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->