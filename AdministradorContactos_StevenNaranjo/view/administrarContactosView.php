<?php
include_once 'public/header.php';
?>


<div class="page-wrapper chiller-theme toggled">

    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="public/img/isotipo_Rolosa.jpeg" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name">
                        <strong>Rolosa</strong>
                    </span>
                    <span class="user-role">Administrador Contactos</span>
                    <span class="user-status">
                        <!--<i class="fa fa-circle"></i>-->
                        <span>Steven Naranjo Mora </span>
                    </span>
                </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
                <div>

                </div>
            </div>
            <!-- sidebar-search  -->
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->

    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">

        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark bg-light">
            <div class="container-fluid">
                <center>
                    <a class="navbar-brand" href="#">Administracion de contactos</a>
                </center>


                <form class="d-flex">
                    <button class="btn btn-outline-warning" href="?controlador=Index&accion=mostrar" type="submit">Salir</button>
                </form>

            </div>
        </nav>
        <div class="container" style="width: 100%;">

            <!-- contenido de la pagina -->

            <!--COLUMNA UNO-->
            <div  class="row ">

                <div class="signup-form card my-4" style="width: 42%; height: 505px; overflow: scroll;">


                    <table id="catRolSis" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nick</th>
                                <th>Nombre</th>
                                <th>Genero</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //  print_r($vars['listado']); // imprimir array
                            foreach ($vars['listado'] as $item) {
                                ?>
                            <form  action="?controlador=Usuario&accion=extraerInformacionContacto" method="post" >
                                <tr>
                                    <td><center><?php echo $item[1]; ?></center></td>
                                <td><center><?php echo $item[3]; ?></center></td>
                                <td><center><?php echo $item[8]; ?></center></td>

                                <td>
                                <center>
                                    <input type="text"  id="iptContacto" name="iptContacto" hidden value="<?php echo $item[1]; ?>">
                                    <div class="form-group"> <button type="submit" class="btn btn-outline-secondary">Ver</button> </div> 
                                </center>
                                </td>
                                </tr>

                            </form>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>


                <div class="signup-form  my-4"  style="width: 5%;">

                </div>


                <!--COLUMNA DOS--> 
                <div class="signup-form card my-4"  style="width: 42%;">
                    <center>
                        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3" >
                            <center>
                                <div class="bg-light mr-md-3 ml-3 mr-3 mt-3 pt-3  mb-3 px-3  px-md-5 text-center overflow-hidden">
                                    <div class="signup-form">
                                        <!--        <form action="?controlador=RegistrarUsuario&accion=registrarAdministrador" method="post">            -->

                                        <?php
                                        if ($_SESSION['Contacto'] == null) {
                                            ?>
                                            <form> <!--   se envian los datos por ajax   -->     
                                                <h2>Formulario</h2>        
                                                <div class="form-group"><input type="text" class="form-control" id="" name="" placeholder="Nombre"></div>
                                                <div class="form-group"><input type="email" class="form-control" id="" name="" placeholder="Email"> </div> 
                                                <div class="form-group"><input type="number" class="form-control" id="" name="" placeholder="Telefono"> </div> 
                                                <div class="form-group"><input type="text" class="form-control" id="" name="" placeholder="Edad"></div>
                                                <div class="form-group" > 
                                                    <select class="custom-select d-block w-100" id="country" required>
                                                        <option value="San Jose">San Jose</option>
                                                        <option value="Alajuela">Alajuela</option>
                                                        <option value="Cartago">Cartago</option>
                                                        <option value="Guanacaste">Guanacaste</option>
                                                        <option value="Heredia">Heredia</option>
                                                        <option value="Limon">Limon</option>
                                                        <option value="Puntarenas">Puntarenas</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" > 
                                                    <select class="custom-select d-block w-100" id="country">
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <input type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-secondary" id="registrar" name="registrar" value="Agregar"/>
                                                    <input type="button" href="javascript:;" onclick="registrarAdmi($('#imtNombreAdmi').val());return false;" class="btn btn-outline-secondary" id="registrar" name="registrar" value="Modificar"/>
                                                    <input type="button" href="javascript:;" onclick="registrarAdmi($('#imtNombreAdmi').val());return false;" class="btn btn-outline-secondary" id="registrar" name="registrar" value="Eliminar"/>
                                                </div>
                                                <div class="form-group"><span id="resultado"></span></div>
                                            </form>

                                            <?php
                                        } else {
                                            $listaAux = $_SESSION['Contacto'];
                                            ?>
                                            <!--                                        <form>    se envian los datos por ajax        -->
                                            <h2>Formulario</h2> 
                                            <div class="form-group"><input type="text" class="form-control" id="imtNick" name="imtNick" placeholder="Nombre" value= "<?php echo $listaAux->Nick ?>"  hidden> </div>
                                            <div class="form-group"><input type="text" class="form-control" id="imtNombreAdmi" name="imtNombreAdmi" placeholder="Nombre" value= "<?php echo $listaAux->nombre ?>" > </div>
                                            <div class="form-group"><input type="email" class="form-control" id="imtEmailAdmi" name="imtEmailAdmi" placeholder="Email" value=" <?php echo $listaAux->correo ?>"> </div> 
                                            <div class="form-group"><input type="number" class="form-control" id="imtTelefono" name="imtTelefono" placeholder="Telefono" value="<?php echo $listaAux->telefono ?>"> </div> 
                                            <div class="form-group"><input type="text" class="form-control" id="imtEdadAdmi" name="imtEdadAdmi" placeholder="Edad" value="<?php echo $listaAux->edad ?>"></div>
                                            <div class="form-group" > 
                                                <select class="custom-select d-block w-100" id="cmbProvincia" name="cmbProvincia" required>
                                                    <option  value="San Jose">San Jose</option>
                                                    <option value="Alajuela">Alajuela</option>
                                                    <option value="Cartago">Cartago</option>
                                                    <option value="Guanacaste">Guanacaste</option>
                                                    <option value="Heredia">Heredia</option>
                                                    <option value="Limon">Limon</option>
                                                    <option value="Puntarenas">Puntarenas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" > 
                                                <select class="custom-select d-block w-100" id="cmbGenero" name="cmbGenero" >
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                </select>
                                            </div>

                                            <input type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"class="btn btn-outline-secondary" id="registrar" name="registrar" value="Agregar"/>
                                            <input type="button" href="javascript:;" onclick="actualizarContacto2($('#imtNick').val(), $('#imtNombreAdmi').val(), $('#imtEmailAdmi').val(), $('#imtTelefono').val(), $('#imtEdadAdmi').val(), $('#cmbProvincia').val(), $('#cmbGenero').val());return false;" class="btn btn-outline-secondary" id="registrar" name="registrar" value="Modificar"/>
                                            <input type="button" href="javascript:;" onclick="eliminarContacto($('#imtNick').val());return false;" class="btn btn-outline-secondary" id="Eliminar" name="Eliminar" value="Eliminar"/>
                                        </div>
                                        <div class="form-group"><span id="resultadoActualizacionContacto"></span></div>
                                        <!--                                        </form>-->

                                        <?php
                                    }
                                    ?>


                                </div>
                        </div> 

                </div>  
                </center>
            </div>
        </div>







        <footer class="text-center">
            <center>
                <div class="container">
                    <span class="text-muted">Prueba Tecnica Steven Naranjo Mora</span>
                </div>
            </center>
        </footer>

</div>

</main>
<!-- page-content" -->
</div>
<!-- page-wrapper -->




<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Registrar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <center>

                    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3"style="width: 100%;" >

                        <div class="bg-light  ml-auto mr-auto mt-4 mb-4 pt-3   px-3  px-md-5 text-center overflow-hidden">
                            <div class="signup-form">

                                <form action="?controlador=Usuario&accion=registrarForm" method="post"> <!--   se envian los datos por ajax   -->    
                                    <div class="form-group"><input type="text" class="form-control" id="nombreForm" name="nombreForm" placeholder="Nombre de usuario"></div>
                                    <div class="form-group"><input type="password" class="form-control" id="contrasenaForm" name="contrasenaForm" placeholder="Contraseña"> </div> 

                                    <div class="btn-group" role="group" aria-label="Basic example">
                                       <button type="submit" class="btn btn-outline-secondary">Agregar</button>
                                        <!--<input type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-secondary" id="registrar" name="registrar" value="Agregar"/>-->
                                    </div>
                                    <div class="form-group"><span id="resultado"></span></div>
                                </form>

                            </div>
                        </div>

                    </div>
                </center>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Understood</button>-->
            </div>
        </div>

    </div>
</div>



<?php
include_once 'public/footer.php';
?>