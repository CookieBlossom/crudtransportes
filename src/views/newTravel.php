<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/newtravel.css">
</head>
<body>
    <div class="container">
        <div class="top-container">
            <i class="fa-solid fa-house" style="padding-left: 15px; padding-right: 15px;"></i>
            Crear un nuevo viaje
            <button class="btn-back" onclick="window.location.href='home.php'">Volver</button>
        </div>
        <form id="newTravelForm">
        <label for="travel_date">Fecha del viaje:</label>
        <input type="date" id="travel_date" name="travel_date" required placeholder="Selecciona la fecha del viaje">

        <label for="origin_address">Dirección de origen:</label>
        <input type="text" id="origin_address" name="origin_address" required placeholder="Ej: Calle La Florida 12">

        <label for="origin_commune">Comuna de origen:</label>
        <input type="text" id="origin_commune" name="origin_commune" required placeholder="Ej: Peñalolén">

        <label for="origin_contact">Contacto de origen:</label>
        <input type="text" id="origin_contact" name="origin_contact" required placeholder="Ej: +56 911234421" pattern="^\+569\d{8}$" title="Número de teléfono válido: +56 seguido de 9 dígitos">

        <label for="destination_address">Dirección de destino:</label>
        <input type="text" id="destination_address" name="destination_address" required placeholder="Ej: Avenida La Reina 22">

        <label for="destination_commune">Comuna de destino:</label>
        <input type="text" id="destination_commune" name="destination_commune" required placeholder="Ej: Lo Barnechea">

        <label for="destination_contact">Contacto de destino:</label>
        <input type="text" id="destination_contact" name="destination_contact" required placeholder="Ej: +56 917282285" pattern="^\+569\d{8}$" title="Número de teléfono válido: +56 seguido de 9 dígitos">

        <label for="executive_user">Ejecutivo:</label>
        <input type="text" id="executive_user" name="executive_user" required placeholder="Ej: Kevin Duarte">

        <label for="requester_user">Solicitante:</label>
        <input type="text" id="requester_user" name="requester_user" required placeholder="Ej: Sofía Martinez Garcia">

        <label for="travel_value">Valor:</label>
        <input type="number" id="travel_value" name="travel_value" required placeholder="Ej: 251815" min="0" step="1">

        <button type="submit" class="btn-submit">Crear viaje</button>
        </form>
        <div id="responseMessage"></div>
    </div>
    <script src="./assets/js/newtravel.js"></script>
</body>
</html>