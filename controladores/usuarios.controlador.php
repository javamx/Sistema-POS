<?php
    class ControladorUsuarios{
        static public function ctrIngresoUsuario(){
            if (isset($_POST["ingUsuario"])) {
                if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPasword"])){
                    $encriptar = crypt($_POST["ingPasword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    $tabla = "usuarios";
                    $item = "usuario";
                    $valor = $_POST["ingUsuario"];
                    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
                    if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["perfil"] = $respuesta["perfil"];
                        echo "<script>window.location = 'inicio';</script>";
                    } else {
                        echo '<br><div class="alert alert-danger">Error al Ingresar, vuelva a intentarlo</div>';
                    }
                    
                }
            }
        }

        static public function ctrCrearUsuario(){
            if (isset($_POST["nuevoUsuario"])) {
                if (preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ ]+$/', $_POST["nuevoNombre"]) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {
                        /* Validar Imagen */
                        $ruta = "";
                        if(isset($_FILES["nuevaFoto"]["tmp_name"])){
                            list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                            $nuevoAncho = 500;
					        $nuevoAlto = 500;
                            /* Directorio de imagenes usuario */
                            $directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];
                            mkdir($directorio, 0755);
                            /* ver funciones segun tipo de imagen JPG */
                            if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
                                $aleatorio = mt_rand(100,99999);
                                $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
                                $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagejpeg($destino, $ruta);                               
                            }
                        } 
                        if($_FILES["nuevaFoto"]["type"] == "image/png"){
                            $aleatorio = mt_rand(100,99999);
                            $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        }                        
                        /* fin validar Imagen */
                        $tabla = "usuarios";
                        /* Encriptar Contraseña */
                        $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                        $datos = array("nombre" => $_POST["nuevoNombre"],
                                        "usuario" => $_POST["nuevoUsuario"],
                                        "password" => $encriptar,
                                        "perfil" => $_POST["nuevoPerfil"],
                                        "foto" => $ruta);
                        $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);  
                        if ($respuesta == "ok") {
                            echo '<script>
                            swal({
                                type: "success",
                                title: "El Usuario ha sido guardado correctamente",
                                timer: 4000,
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                cleseOnConfirm: false
                                }).then((result)=>{
                                    if (result.value) {
                                        window.location = "usuarios"                                        
                                    }
                                });
                        </script>';
                        }
                        if ($respuesta == "error") {
                            echo '<script>
                            swal({
                                type: "error",
                                title: "Error al ejecutar la operacion",
                                timer: 4000,
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                cleseOnConfirm: false
                                }).then((result)=>{
                                    if (result.value) {
                                        window.location = "usuarios"                                        
                                    }
                                });
                        </script>';
                        }               
                }else {
                    echo '<script>
                            swal({
                                type: "error",
                                timer: 4000,
                                title: "El Usuario no puede estar vacio o llevar caracteres especiales",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                cleseOnConfirm: false
                                }).then((result)=>{
                                    if (result.value) {
                                        window.location = "usuarios"                                        
                                    }
                                });
                        </script>';
                }
            }
        }
    }