<?php
    require 'config/config.php';
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Reestablecer contraseña</h1>

        <div class="alert p-4 col-8 mx-auto shadow">
            <form action="reset-pw-step2.php" method="post">

                <label for="email">Usuario (email)</label>
                <input type="email" name="email"
                       class='form-control' id="email" required>
                <br>
                <button class="btn btn-dark my-2 px-4">
                    Enviar
                </button>
            </form>
        </div>

<?php
    if( isset($_GET['error']) ){
?>
        <div class="alert text-danger p-4 col-8 mx-auto shadow">
            Dirección de correo incorrecta
        </div>
<?php
    }
?>

    </main>

<?php  include 'layouts/footer.php';  ?>