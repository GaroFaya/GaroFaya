$(document).ready(function () {
    // Efecto de hover en el formulario
    $('.form-container').hover(
        function() {
            $(this).css('transform', 'scale(1.05)');
        },
        function() {
            $(this).css('transform', 'scale(1)');
        }
    );

    // Efecto de focus en los campos del formulario
    $('input, select').focus(function() {
        $(this).prev('label').css('color', '#007bff');
    }).blur(function() {
        $(this).prev('label').css('color', '#333');
    });

    // Manejador de evento para el envío del formulario
    $('#clienteForm').on('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(event.target);

        const clienteData = {
            peso: formData.get('peso'),
            talla: formData.get('talla'),
            isotipo: formData.get('isotipo'),
            edad: formData.get('edad'),
            actividad_fisica: formData.get('actividad_fisica'),
            indice_masa: formData.get('indice_masa'),
            indice_grasa: formData.get('indice_grasa'),
            fecha: formData.get('fecha')
        };

        console.log('Datos del formulario:', clienteData);

        // Aquí puedes enviar los datos al servidor usando AJAX
        $.ajax({
            url: 'guardar_cliente.php',
            method: 'POST',
            data: clienteData,
            success: function (response) {
                alert('Datos guardados exitosamente');
            },
            error: function () {
                alert('Error al guardar los datos');
            }
        });
    });
});
