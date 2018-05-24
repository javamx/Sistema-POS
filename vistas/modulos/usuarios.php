<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuarios
            <small>Panel de Control</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio">
                    <i class="fa fa-dashboard"></i> Inicio</a>
            </li>
            <li>
                <a href="#">Administrar Usuarios</a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario">
                    Agregar Usuario
                </button>
            </div>
            <div class="box-body">
                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10px; align-content: center">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th style="width: 40px; align-content: center">Foto</th>
                            <th>Perfil</th>
                            <th style="width: 50px; align-content: center">Estado</th>
                            <th>Ultima sesion</th>
                            <th style="width: 50px; align-content: center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $item = null;
                        $valor = null;
                        $item = null;
                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                        foreach ($usuarios as $key => $value) {
                            $item = $key + 1;
                            echo '<tr>
                                    <td>'.$item.'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["usuario"].'</td>';
                                    if($value["foto"] != ""){

                                        echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                    
                                      }else{
                    
                                        echo '<td><img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbnail" width="40px"></td>';
                    
                                      }
                                   
                                    echo '<td>'.$value["perfil"].'</td>
                                    <td>
                                        <button class="btn btn-success btn-xs">Activado</button>
                                    </td>
                                    <td>'.$value["ultimo_login"].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario">
                                            
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                             <button class="btn btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                    </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modalAgregarUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color: white">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="text" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-users"></i>
                                </span>
                                <select name="nuevoPerfil" class="form-control input-lg">
                                    <option value="">Seleccione Perfil</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="especial">Especial</option>
                                    <option value="vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel">Subir Foto Usuario</div>
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso maximo de Imagen 2Mb</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbnail previsualizar" width="100px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario -> ctrCrearUsuario();
                ?>
            </form>
        </div>
    </div>
</div>

/* Editar Usuario */

<div class="modal fade" id="modalEditarUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="modal-header" style="background:#3c8dbc; color: white">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Editar Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input type="text" class="form-control input-lg" id="editarUsuario" name="EditarUsuario" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="text" class="form-control input-lg" name="editarPassword" placeholder="Nueva Contraseña" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-users"></i>
                                </span>
                                <select name="editarPerfil" class="form-control input-lg">
                                    <option value="" id="editarPerfil"></option>
                                    <option value="administrador">administrador</option>
                                    <option value="especial">especial</option>
                                    <option value="vendedor">vendedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel">Subir Foto Usuario</div>
                            <input type="file" class="nuevaFoto" name="editarFoto">
                            <p class="help-block">Peso maximo de Imagen 2Mb</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbnail previsualizar" width="100px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
                <?php
                  /*   $crearUsuario = new ControladorUsuarios();
                    $crearUsuario -> ctrCrearUsuario(); */
                ?>
            </form>
        </div>
    </div>
</div>