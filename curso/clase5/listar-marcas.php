<?php
    include '../layouts/header.php';
    #### esto va en una función para conectar el server de mysql
    // utilizamos la función mysqli_connect()
    $link = mysqli_connect(
                'localhost',
                'root',
                'root',
                'catalogo70273'
    );

    #### esto va en una función
    $sql = "SELECT * FROM marcas";
    $resultado = mysqli_query( $link, $sql );
?>
    <main class="container py-4">
        <h1>Listado de marcas</h1>
<?php
    ### Función auxiliar para convertir UN (1)
    # elemento del objeto en un array asociativo
    while( $marca = mysqli_fetch_assoc( $resultado ) ) {
        echo $marca['idMarca'], ' ', $marca['mkNombre'], '<br>';
    }
?>

    </main>
<?php
include '../layouts/footer.php';