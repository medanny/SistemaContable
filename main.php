<?php
//SETUP
$title="main";//TITULO
//$isindex=1; //ABILITAR SI ES LOGIN
include("template/inc/head.template.php");
include("template/inc/header.template.php");
include("template/inc/sidebar.template.php");
include("template/inc/contstart.template.php");
//CONTENT HERE       
?> 
<section class="panel">
                <div id="c-slide" class="carousel slide auto panel-body">
                    <ol class="carousel-indicators out">
                        <li class="" data-slide-to="0" data-target="#c-slide"></li>
                        <li class="" data-slide-to="1" data-target="#c-slide"></li>
                        <li class="active" data-slide-to="2" data-target="#c-slide"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item text-center">
                            <h3>Bucket Admin is an Awesome Dashboard</h3>
                            <p>Awesome admin template</p>
                            <small class="text-muted">Based on Latest Bootstrap 3.0.3</small>
                        </div>
                        <div class="item text-center">
                            <h3>Well Organized</h3>
                            <p>Awesome admin template</p>
                            <small class="text-muted">Huge UI Elements</small>
                        </div>
                        <div class="item text-center active">
                            <h3>Well Documentation</h3>
                            <p>Awesome admin template</p>
                            <small class="text-muted">Very Easy to Use</small>
                        </div>
                    </div>
                    <a data-slide="prev" href="#c-slide" class="left carousel-control">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a data-slide="next" href="#c-slide" class="right carousel-control">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </section>
           
<?php
include("template/inc/contend.template.php");
?>