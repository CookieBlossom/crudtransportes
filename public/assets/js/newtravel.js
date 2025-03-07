document.getElementById('newTravelForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);
    formData.append('action', 'createTravel');
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'src/controllers/travelController.php', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        try {
            let response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
                alert(response.message);
                document.getElementById('newTravelForm').reset();
            } else {
                alert(response.message);
            }
        } catch (e) {
            console.error("Error parsing JSON:", xhr.responseText);
            alert("Error inesperado, revisa la consola.");
        }
    };

    xhr.onerror = function() {
        alert("Error de conexión con el servidor.");
    };

    xhr.send(formData);
});
