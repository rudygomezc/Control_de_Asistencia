$(function(){
    $('#buscar-usuario').on('keyup',function(){
	var dato = $('#buscar-usuario').val();
	var url = '../models/buscar_usuario.php';
	$.ajax({
	type:'POST',
	url:url,
	data:'dato='+dato,
	success: function(datos){
            $('#muestra-usuarios').html(datos);
	}
	});
	return false;
    });
    $('#nuevo-usuario').on('click',function(){
	$('#formulario')[0].reset();
	$('#pro').val('Registro');
	$('#edi').hide();
	$('#reg').show();
	$('#registra-usuario').modal({
            show:true,
            backdrop:'static'
	});
    });

    $('#proceso').on('change',function(){
		var id = $('#proceso').val();
		var url = '../models/mostrar_proceso.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id='+id,
			success: function(datos){
	            $('#muestra-procesos').html(datos);
			}
		});
		return false;
    });

    $('#datos').on('change',function(){
    	var id = $('#datos').val();
    	var url = '../models/mostrar_datos.php';
    	$.ajax({
    		type:'POST',
    		url:url,
    		data:'id='+id,
    		success: function(datos){
    			$('#muestra-datos').html(datos);
    		}
    	});
    	return false;
    });

    $('#nuevo-proceso').on('click',function(){
        $('#formulario')[0].reset();
		$('#proc').val('Registro');
		$('#subs').val($("#proceso").val());
        
        var pregunta = confirm('¿Esta seguro de eliminar este Usuario?');
		var palabra = $('#subs').val();
		var letras = palabra.split("");
		var primero = letras.shift();
		var filas = ($('#parent_2').get(0).rowIndex - $('#parent_1').get(0).rowIndex);
		if(filas < 10){
			$('#codv').val('V'+primero+'00'+filas);
		}else if(filas >= 10){
			$('#codv').val('V'+primero+'0'+filas);
		}
		$('#edi').hide();
		$('#reg').show();
		$('#registra-proceso').modal({
			show:true,
			backdrop:'static'
		});
    });

    $('#nuevo-datos').on('click',function(){
		$('#formulario')[0].reset();
		$('#proc').val('Registro');
		$('#subs').val($("#datos").val());

		var palabra = $('#subs').val();
		var letras = palabra.split("");
		var primero = letras.shift();
		var filas = ($('#parent_2').get(0).rowIndex - $('#parent_1').get(0).rowIndex);
		if(filas < 10){
			$('#codv').val('V'+primero+'00'+filas);
		}else if(filas >= 10){
			$('#codv').val('V'+primero+'0'+filas);
		}
		$('#edi').hide();
		$('#reg').show();
		$('#registra-datos').modal({
			show:true,
			backdrop:'static'
		});
    });

});

function agregarVariable(){
	var url = '../models/agregar_proceso.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if($('#proc').val() == 'Registro'){
				$('#formulario')[0].reset();
				$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(500).hide(200);
				$('#muestra-procesos').html(registro);
				$('#registra-proceso').modal('hide');
				return false;
			}else{
				$('#mensaje').addClass('bien').html('Edicion completado con exito').show(200).delay(500).hide(200);
				$('#muestra-procesos').html(registro);
				$('#registra-proceso').modal('hide');
				return false;
			}
		}
	});
	return false;
}

function agregarDatos(){
	var url = '../models/agregar_datos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if($('#proc').val() == 'Registro'){
				$('#formulario')[0].reset();
				$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(500).hide(200);
				$('#muestra-datos').html(registro);
				$('#registra-datos').modal('hide');
				return false;
			}else{
				$('#mensaje').addClass('bien').html('Edicion completado con exito').show(200).delay(500).hide(200);
				$('#muestra-datos').html(registro);
				$('#registra-datos').modal('hide');
				return false;
			}
		}
	});
	return false;
}

function ingresarDatos(idPro, idVar){
	$('#formulario')[0].reset();
	var url = '../models/editar_datos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'idPro='+idPro+'&idVar='+idVar,
		success: function(valores){
			var datos = eval(valores);
			$('#edi').show();
			$('#subs').val(datos[2]);
			$('#codv').val(datos[0]);
			$('#desv').val(datos[1]);
			$('#unid').val(datos[3]);
			$('#ener').val(datos[4]);
			$('#febr').val(datos[5]);
			$('#marz').val(datos[6]);
			$('#abri').val(datos[7]);
			$('#mayo').val(datos[8]);
			$('#juni').val(datos[9]);
			$('#juli').val(datos[10]);
			$('#agos').val(datos[11]);
			$('#seti').val(datos[12]);
			$('#octu').val(datos[13]);
			$('#novi').val(datos[14]);
			$('#dici').val(datos[15]);
			$('#registra-datos').modal({
				show:true,
				backdrop:'static'
			});
			return false;
		}
	});
	return false;
}

function editarVariable(idPro, idVar){
	$('#formulario')[0].reset();
    var url = '../models/editar_proceso.php';
    $.ajax({
	type:'POST',
	url:url,
	data:'idPro='+idPro+'&idVar='+idVar,
	success: function(valores){
            var datos = eval(valores);
            $('#reg').hide();
            $('#edi').show();
            $('#proc').val('Edicion');
            $('#subs').val(datos[2]);
			$('#codv').val(datos[0]);
			$('#desv').val(datos[1]);
			$('#unid').val(datos[3]);
            $('#registra-proceso').modal({
				show:true,
                backdrop:'static'
            });
            return false;
	}
    });
    return false;
}

function eliminarVariable(idPro, idVar){
	var url = '../models/eliminar_proceso.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Usuario?');
	if(pregunta==true){
		$.ajax({
			type:'POST',
			url:url,
			data:'idPro='+idPro+'&idVar='+idVar,
			success: function(registro){
				$('#muestra-procesos').html(registro);
				return false;
			}
		});
		return false;
	}else{
		return false;
	}
}

function agregarUsuario(){
    var url = '../models/agregar_usuario.php';
    $.ajax({
	type:'POST',
	url:url,
	data:$('#formulario').serialize(),
	success: function(registro){
            if ($('#pro').val() == 'Registro'){
				$('#formulario')[0].reset();
				$('#mensaje').addClass('bien').html('Registro completado con éxito').show(200).delay(500).hide(200);
				$('#muestra-usuarios').html(registro);
                $('#registra-usuario').modal('hide'); //Cerrar formulario
				return false;
            }else{
				$('#mensaje').addClass('bien').html('Edicion completada con éxito').show(200).delay(500).hide(200);
				$('#muestra-usuarios').html(registro);
                $('#registra-usuario').modal('hide'); 
		return false;
            }
	}
    });
    return false;
}
function editarUsuario(id){
    $('#formulario')[0].reset();
    var url = '../models/editar_usuario.php';
    $.ajax({
	type:'POST',
	url:url,
	data:'id='+id,
	success: function(valores){
            var datos = eval(valores);
            $('#reg').hide();
            $('#edi').show();
            $('#pro').val('Edicion');
            $('#id-usua').val(id);
            $('#usua').val(datos[0]);
            $('#user').val(datos[1]);
            $('#nive').val(datos[2]);
            $('#esta').val(datos[3]);
            $('#emp').val(datos[4]);
            $('#registra-usuario').modal({
		show:true,
                backdrop:'static'
            });
            return false;
	}
    });
    return false;
}
function eliminarUsuario(id){
    var url = '../models/eliminar_usuario.php';
    var pregunta = confirm('¿Esta seguro de eliminar este Usuario?');
    if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#muestra-usuarios').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}
