
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/home.css">
</head>
<body>
    <div class="navbar" id="navbar">
        <i class="fa-solid fa-truck" style="font-size: 30px; text-align: center;"></i>
        <h1>PANEL DE ADMINISTRACION</h1>
    </div>
    <div class="container" id="container">
        <div class="top-container">
            <h3>Viajes</h3>
            <button class="btn-travel" onclick="window.location.href='?route=newTravel'">Nuevo Viaje</button>
        </div>
        <div class="tableTravel">
            <div class="statements">
                <li>Fecha</li>
                <li>Origen</li>
                <li>Destino</li>
                <li>Solicitante</li>
                <li>Ejecutivo</li>
                <li>Valor</li>
                <li>Acciones</li>
            </div>
            <div class="travelData">
            <?php
                require_once 'src/controllers/homeController.php';
                if ($allTravels) {
                    foreach($currentTravels as $travel) {
                        echo "<div class='row'>";
                        echo "<div class='dataDate'>" . $travel['fecha_viaje'] . "</div>";
                        echo "<div class='dataAdress'>" . $travel['origen_direccion'] . "</div>";
                        echo "<div class='dataDestination'>" . $travel['destino_direccion'] . "</div>";
                        echo "<div class='dataRequester'>" . $travel['usuario_solicitante'] . "</div>";
                        echo "<div class='dataExecutive'>" . $travel['usuario_ejecutivo'] . "</div>";
                        echo "<div class='dataValue'>" . $travel['valor'] . "</div>";
                        echo "<i class='fa-solid fa-ellipsis' data-id='" . $travel['id'] . "' onclick='toggleMenu(event)'></i>";
                        echo "<div class='actionMenu' id='menu_" . $travel['id'] . "'>";
                        echo "<a href='?route=editTravel&id=" . $travel['id'] . "'>Editar</a>";
                        echo "<a href='delete.php?id=" . $travel['id'] . "'>Eliminar</a>";
                        echo "<a href='?route=detailTravel&id=" . $travel['id'] . "'>Ver Detalle</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<div>No hay viajes todavía</div>";
                }
            ?>
            </div>
        </div>
        <div class="pagination">
            <?php
                if ($page > 1) {
                    echo "<a href='?page=" . ($page - 1) . "'>Anterior</a>";
                }
                for ($i = $startPage; $i <= $endPage; $i++) {
                    if ($i == $page) {
                        echo "<span>$i</span>";
                    } else {
                        echo "<a href='?page=$i'>$i</a>";
                    }
                }
                if ($page < $totalPages) {
                    echo "<a href='?page=" . ($page + 1) . "'>Siguiente</a>";
                }
            ?>
        </div>
    </div>
    
    <div class="footer" id="footer">
    </div>
    <script src="./assets/js/home.js"></script>
</body>
</html>