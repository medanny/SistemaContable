<section class="panel">
                    <header class="panel-heading">
                        Cuentas
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Tipo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("class/catalogos.class.php"); 
                            global $catalogo;
                            $id = $_SESSION['id_ejercisio'];
                            $content=$catalogo->getClases($id);
                            $count = mysql_num_rows($content);
                            if($count>=1){


                            while($row = mysql_fetch_array($content)) {
                             ?>
                            <tr>
                                <td><a href="#"><? echo $row['nombre'];?></a></td>
                                <td><? echo $row['descripcion'];?></td>
                                <td><? echo $row['id_tipo'];?></td>
                                
                            </tr>

                            <?php
                             }}
                             else
                             {
                              ?>
                            <tr><td>NO DATA</td></tr>

                              <?php  
                             }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </section>
<a href="#myModal" data-toggle="modal" class="btn btn-success">
                                    Nueva Cuenta 
                                </a>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Nueva Cuenta</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" role="form" action="class/process.class.php?cuenta_ins" method="post">
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nombre</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail1" name="nombre" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Descripcion</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="descripcion" id="inputPassword1" placeholder="Descripcion" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Tipo</label>
                            <div class="col-lg-10">
                            <select class="form-control" name="tipo">

                            <?php 
                            $tipos=$catalogo->getTipo();
                            while($tipo_array = mysql_fetch_array($tipos)) {
                            ?>
                                <option value="<?php echo $tipo_array['id'];?>"><?php echo $tipo_array['nombre'];?></option>
                             <?php }?>   
                            
                            </select>
                            </div>
                            </div>

                             <input type="hidden" value="<?php echo $_SESSION['id_ejercisio'];?>" name="ejercisio" />
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-danger">Agregar Cuenta</button>
                                </div>
                            </div>
                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>