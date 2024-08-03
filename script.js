$(document).ready(function() {
    // Mostrar campo de tipo de plan solo si se selecciona "mensual"
    $('#plan').change(function() {
        const planSeleccionado = $(this).val();
        if (planSeleccionado === 'mensual') {
            $('#tipoPlanGroup').show();
        } else {
            $('#tipoPlanGroup').hide();
        }
    });

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

    // Validación antes de enviar el formulario
    $('#registroForm').on('submit', function(e) {
        const clave = $('#clave').val();
        const confirmarClave = $('#confirmarClave').val();

        // Verificar longitud de la clave
        if (clave.length < 6) {
            e.preventDefault();
            $('#mensajeClave').show();
            return;
        } else {
            $('#mensajeClave').hide();
        }

        // Verificar que las claves coincidan
        if (clave !== confirmarClave) {
            e.preventDefault();
            alert('Las claves no coinciden.');
            return;
        }
    });
});
