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
        // Quita esta línea si quieres enviar el formulario de forma normal
        // event.preventDefault();

        const formData = new FormData(event.target);

        const clienteData = {
            peso: formData.get('peso'),
            talla: formData.get('talla'),
            isotipo: formData.get('isotipo'),
            edad: formData.get('edad'),
            actividad_fisica: formData.get('actividad_fisica'),
            indice_masa: formData.get('indice_masa'),
            indice_grasa: formData.get('indice_grasa'),
        };

        console.log('Datos del Cliente:', clienteData);

        // Aquí puedes añadir la lógica para enviar los datos al servidor
        // o almacenarlos según sea necesario.
    });
});
