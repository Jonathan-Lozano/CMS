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
                var url = $(this).data('slider');
                //alert(url.substring(url.indexOf('=')+1));

                $.get(url, function (result) {
                    //$('#idU').val(result.id);
                    //$('#nombreSU').val(result.nombre);
                    //$('#descripcionSU').val(result.descripcion);
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