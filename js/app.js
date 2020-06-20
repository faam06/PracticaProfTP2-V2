	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'ver_cliente_sup.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}

		$('#dataUpdate').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id_suc = button.data('id_suc')
		  var nombre_suc = button.data('nombre_suc') // Extraer la información de atributos de datos
		  var direccion_suc = button.data('direccion_suc') // Extraer la información de atributos de datos
		  var telefono_suc = button.data('telefono_suc') // Extraer la información de atributos de datos
		  
		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar Sucursal: '+id_suc)
		  modal.find('.modal-body #nombre_suc').val(nombre_suc)
		  modal.find('.modal-body #direccion_suc').val(direccion_suc)
		  modal.find('.modal-body #telefon_suc').val(telefono_suc)
		  $('.alert').hide();//Oculto alert
		})
		
		$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id_suc = button.data('id_suc') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#id_suc').val(id_suc)
		})

	$( "#actualidarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "suc_modificar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
		
		$( "#guardarDatosCliente" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "cliente_agregar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_register").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_register").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});

		$( "#guardarDatosProducto" ).submit(function( event ) {
			var parametros = $(this).serialize();
				 $.ajax({
						type: "POST",
						url: "producto_agregar.php",
						data: parametros,
						 beforeSend: function(objeto){
							$("#datos_ajax_register").html("Mensaje: Cargando...");
						  },
						success: function(datos){
						$("#datos_ajax_register").html(datos);
						
						load(1);
					  }
				});
			  event.preventDefault();
			});

		$( "#guardarDatos" ).submit(function( event ) {
			var parametros = $(this).serialize();
				 $.ajax({
						type: "POST",
						url: "suc_agregar.php",
						data: parametros,
						 beforeSend: function(objeto){
							$("#datos_ajax_register").html("Mensaje: Cargando...");
						  },
						success: function(datos){
						$("#datos_ajax_register").html(datos);
						
						load(1);
					  }
				});
			  event.preventDefault();
			});
		
		$( "#eliminarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "eliminar_sup.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
					
					$('#dataDelete').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
		});
