<?php
    include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Formulario de envío</h1>

        <form action="procesa-datos.php" method="post">
            <input type="text" name="nombre" class="form-control">
            <input type="email" name="email" class="form-control">
            <button class="btn btn-success mt-3">enviar</button>

        </form>


    </main>
<?php
    include '../layouts/footer.php';