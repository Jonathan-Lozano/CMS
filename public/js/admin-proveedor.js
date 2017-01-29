/**
 * Created by Jonathan on 27/01/2017.
 */
(function ($) {

    var app = {
        init : function(){
          app.editProveedor();
        },

        editProveedor: function () {

            $(".btn-edit").click(function () {

                var url = $(this).data('proveedor');

                $.get(url, function (result) {
                    $("#idUp").val(result.id);
                    $("#nombreUp").val(result.nombre);
                    $("#empresaUp").val(result.empresa);
                    $("#email_contactUp").val(result.email_contact);
                    $("#tel_contactUp").val(result.tel_contact);
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
})(jQuery);