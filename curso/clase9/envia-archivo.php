<?php
include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>formulario de envío</h1>

        <div class="alert p-4 col-8 mx-auto shadow">
            <form action="procesa-archivo.php" method="post" enctype="multipart/form-data">
                <input type="file" name="prdImagen" class="form-control">
                <button class="btn btn-info mt-3">publicar</button>
            </form>
        </div>

    </main>
<?php
include '../layouts/footer.php';
