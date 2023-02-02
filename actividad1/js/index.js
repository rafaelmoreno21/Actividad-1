function calcular(nombre,apellido,edad,civil,sexo,sueldo) {
    
    if ((nombre != "") && (apellido != "") && (edad != "") && (civil != "none") && (sexo != "none") && (sueldo != "")) {
        var params = {
            "nombre": nombre,
            "apellido": apellido,
            "edad": edad,
            "civil": civil,
            "sexo":sexo,
            "sueldo":sueldo
        };

        $.ajax({

            type: "post",
            url: "php/operacion.php",
            data: params,
            success: function(respuesta){
                document.getElementById("resp").innerHTML = respuesta;
                document.getElementById("nombreid").innerHTML = '';
                document.getElementById("apellidoid").innerHTML = '';
                document.getElementById("edadid").innerHTML = '';
            },
            fail:function(){
                document.getElementById("resp").innerHTML = 'Fallo de ajax';
            },
            beforeSend:function(){
                document.getElementById("resp").innerHTML = 'Esperando respuesta de ajax';
            }        
    
        });

        
    }
    else{
        document.getElementById("resp").innerHTML = 'Vacio';
    }

}