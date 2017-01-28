/**
 * Created by Jonathan on 09/01/2017.
 */
(function($){

    var app = {
        init: function () {
            app.editSlider();
        },

        editSlider: function(){
            $('.btn-editSlider').click(function () {

                var id = $(this).data('slider');
                var form = $('#editSlid');
                var url = form.attr('action').replace('ID', id);

                $.get(url, function (result) {
                    $('#idUp').val(result.id);
                    $('#nombreSU').val(result.nombre);
                    $('#descripcionSU').val(result.descripcion);
                }).fail(function () {
                    alert("Ocurrío un problema. Intentalo de nuevo");
                });
            });

        }
    };
    $(function () {
        app.init();
        $(window).resize();
    });

})
(jQuery);