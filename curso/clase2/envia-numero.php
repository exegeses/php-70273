<?php
    include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Formulario de envío</h1>

        <div class="alert col-8 mx-auto shadow">
            <form action="procesa-numero.php" method="post">
                <label>Ingrese un número</label>
                <input type="number" name="numero" class="form-control">
                <button class="btn btn-success mt-3">enviar</button>
            </form>
        </div>

    </main>
<?php
    include '../layouts/footer.php';