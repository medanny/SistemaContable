<section class="panel">
                    <header class="panel-heading">
                        Ejercisios
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th> Nombre</th>
                                <th>Descripcion</th>
                                <th>RFC</th>
                                <th>Status</th>
                                <th>Telefono</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            global $ejercisio;
                            $content=$ejercisio->getEjercisios();
                            while($row = mysql_fetch_array($content)) {
                             ?>
                            <tr>
                                <td><a href="#"><? echo $row['nom_Empresa'];?></a></td>
                                <td><? echo $row['descripcion'];?></td>
                                <td><? echo $row['RFC'];?></td>
                                <td><span class="label label-info label-mini"><a href="class/process.class.php?set_ejer=<? echo $row['id'];?>">Elegir</span></a></td>
                                <td>
                                    <? echo $row['telefono'];?>
                                </td>
                            </tr>

                            <?php
                             }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </section>
<a href="#myModal" data-toggle="modal" class="btn btn-success">
                                    Nuevo Ejercisio
                                </a>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Nuevo Ejercisio</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" role="form" action="class/process.class.php?ejer_ins" method="post">
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nombre de la Empresa</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail1" name="nom_Empresa" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Descripcion</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="descripcion" id="inputPassword1" placeholder="Descripcion" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">RFC</label>
                                <div class="col-lg-10">
                                    <input type="text" name="rfc" class="form-control" id="inputPassword1" placeholder="" data-mask="999999999-999" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Direccion</label>
                                <div class="col-lg-10">
                                    <input type="text" name="direccion" class="form-control" id="inputPassword1" placeholder="Direccion" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Telefono</label>
                                

                                <div class="col-lg-10">
                                    <input type="text" placeholder="" data-mask="(999) 999-9999" class="form-control" name="telefono">
                                    
                                </div>


                            </div>


                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-danger">Agregar Ejercisio</button>
                                </div>
                            </div>
                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>