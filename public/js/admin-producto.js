/**
 * Created by Jonathan on 29/01/2017.
 */
(function ($) {
    var app = {
        init : function() {
            app.editProducto();
        },

        editProducto: function () {
            $('.btn-editProducto').click(function () {
                var url = $(this).data('producto');
                $.get(url, function (result) {
                    $("#idUp").val(result.id);
                    $("#nombreUp").val(result.nombre);
                    $("#descripcionUp").val(result.descripcion);
                    $("#categoriaUp").val(result.categoria);
                    $("#precioUp").val(result.precio);
                    $("#cantidadUp").val(result.cantidad);
                    $("#disponibleUp").val(result.disponible);
                    $("#ofertaUp").val(result.oferta);
                }).fail(function () {
                    alert("Algo salio mal. Intenta nuevamente");
                });
            });
        }
    };


    $(function () {
        app.init();
        $(window).resize();
    });
})(jQuery);