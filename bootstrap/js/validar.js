$( document ).ready( function () {
    $("#myform").validate({
        rules:{
            nombre: "required",
            appat: "required",
            apmat: "required",
            correo:{
                required: true,
                email: true
            },
            telcel:{
                required: true,
                maxlength: 10
            },
            fnac: "required"
        },message:{
            nombre: "por favor, escriba un nombre",
            appat: "Por favor, escriba su primer apellido",
            apmat: "Por favor escriba su segundo apellido",
            correo: {
                required: "Escriba su correo electronico",
                email: "No es un correo electronico aceptable"
            },
            telcel: {
                required: "Escriba su numero de telefono",
                maxlength: "Maximo 10 caracteres"
            },
            fnac: "ingrese su fecha de nacimiento"
        },errorElement:"em",
        errorPlacement: function ( error, element ) {
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ){
                error.insertAfter( element.parents( "label" ));
            }else{
                error.insertAfter( element );
            }

        },
        highlight: function ( element, errorClass, validClass) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function ( element, errorClass, validClass) {
            $( element ).addClass( "is-valid").removeClass( "is-invalid" );
        },
        onfocusout: function (element, event) {

            $element = $(element);

            if ( $element.is(':input') && !$element.is(':password')){
                $element.val($.trim($element.val()));
            }
        },
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: "envio.php",
                data: $(form).serialize(),
                success: function (response) {
                    var jsonData=JSON.parse(response);
                    if(jsonData.success=="1"){
                        alert("Gracias. en breve, nos pondremos en contacto con ustedes");
                        var id=jsonData.id;
                        window.location='contacto1.php?per='+id;
                    }else if(jsonData.success=="2") {
                        alert('No fue posible realizar su registro porque su correo ya existe');
                    }else if(jsonData.success=="3"){
                        alert('No fue posible realizar su registro porque su correo es invalido');
                    }else{
                        alert('No se pudo procesar la informacion');
                    }
                }
            });
        }
    });
});