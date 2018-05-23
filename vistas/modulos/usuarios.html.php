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
                <table id="tabla-data" class="table table-bordered table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th style="width: 10px; align-content: center">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th style="width: 30px; align-content: center">Foto</th>
                            <th>Perfil</th>
                            <th style="width: 50px; align-content: center">Estado</th>
                            <th>Ultima sesion</th>
                            <th style="width: 50px; align-content: center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Jose Luis Torres</td>
                            <td>admin</td>
                            <td>foto</td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-success btn-xs">Activado</button>
                            </td>
                            <td>19/05/2018 22:30:59</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Jose Luis Torres</td>
                            <td>admin</td>
                            <td>foto</td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-success btn-xs">Activado</button>
                            </td>
                            <td>19/05/2018 22:30:59</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Jose Luis Torres</td>
                            <td>admin</td>
                            <td>foto</td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-danger btn-xs">Inactivo</button>
                            </td>
                            <td>19/05/2018 22:30:59</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<div class="modal  fade" id="modalAgregarUsuario">
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
                            <input type="file" id="NuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso maximo de Imagen 200Mb</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbnail" width="100px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>