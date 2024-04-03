<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();

    if( $_SESSION['idRol'] == 1 ){
        require 'funciones/conexion.php';
        require 'funciones/usuarios.php';
        $usuario = verUsuarioPorID();
    }
    else{
        $usuario['nombre'] = $_SESSION['nombre'];
        $usuario['apellido'] = $_SESSION['apellido'];
        $usuario['email'] = $_SESSION['email'];
        $usuario['idUsuario'] = $_SESSION['idUsuario'];
        $usuario['idRol'] = $_SESSION['idRol'];
    }

    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Modificacíon de un usuario</h1>


        <div class='alert p-4 col-8 mx-auto shadow'>
            <form action="modificarUsuario.php" method="post">

                <div class='form-group mb-2'>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre"
                           value="<?= $usuario['nombre'] ?>"
                           class='form-control' id="nombre" required>
                </div>
                <div class='form-group mb-2'>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido"
                           value="<?= $usuario['apellido'] ?>"
                           class='form-control' id="apellido" required>
                </div>
                <div class='form-group'>
                    <label for="email">Email</label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="email" name="email"
                               value="<?= $usuario['email'] ?>"
                               class="form-control" id="email" required>
                    </div>
                </div>
<?php
        if( $_SESSION['idRol'] == 1 ){
            require 'funciones/roles.php';
            $roles = listarRoles();
?>
                <div class='form-group mb-2'>
                    <label for="idRol">Rol</label>
                    <select name="idRol" class='form-select' id="idRol">
       <?php
                while( $rol = mysqli_fetch_assoc( $roles ) ){
                    $sel = ( $usuario['idRol'] == $rol['idRol'] ) ? 'selected':'';
       ?>
                        <option <?= $sel ?> value="<?= $rol['idRol'] ?>"><?= $rol['rol'] ?></option>
        <?php
                }
        ?>
                    </select>
                </div>
<?php
        }else{
?>
                <input type="hidden" name="idRol" value="<?= $usuario['idRol'] ?>">
<?php
        }
?>
                <input type="hidden" name="idUsuario" value="<?= $usuario['idUsuario'] ?>">

                <button class='btn btn-dark my-3 px-4'>Modificación usuario</button>
                <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
                    Volver a panel de usuarios
                </a>
            </form>

        </div>

    </main>

<?php  include 'layouts/footer.php';  ?>