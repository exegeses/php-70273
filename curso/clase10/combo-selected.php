<?php
include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1> seleccionar un elemento de un desplegable</h1>

        <div class="col-8 mx-auto">

            <select name="x" class="form-select">
                <option value="1">item 1</option>
                <option value="2">item 2</option>
                <option value="3">item 3</option>
                <option  value="4" selected>item 4</option>
                <option value="5">item 5</option>
            </select>

        </div>

    </main>
<?php
include '../layouts/footer.php';
