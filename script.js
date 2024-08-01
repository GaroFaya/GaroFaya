$(document).ready(function() {
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

    // Validación básica antes de enviar el formulario
    $('#registroForm').on('submit', function(event) {
        const clave = $('#clave').val();
        if (clave.length < 6) {
            alert('La clave debe tener al menos 6 caracteres.');
            event.preventDefault();
        }
    });
});
