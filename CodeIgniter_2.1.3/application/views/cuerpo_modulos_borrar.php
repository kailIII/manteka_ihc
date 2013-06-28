

<script>
	function Cancelar(){
		document.getElementById("nombre_modulo").innerHTML  = "";
		document.getElementById("descripcion_modulo").innerHTML  = "";
		document.getElementById("profesor_lider").innerHTML  = "";
		document.getElementById("cod_modulo_eliminar").innerHTML  = "";
		document.getElementById("cod_modulo_eliminar").value  = "";
	
		var sesiones = document.getElementById("sesiones");
		$(sesiones).empty();
		var equipo = document.getElementById("equipo");
		$(equipo).empty();
		var profLider = document.getElementById("prof_lider");
		$(profLider).empty();
		var requisitos = document.getElementById("requisitos");
		$(requisitos).empty();
		
		return false;
	}

function detalleModulo(codigo_modulo,descripcion,cod_equipo,nombre_modulo){
	document.getElementById("nombre_modulo").innerHTML = nombre_modulo;
	document.getElementById("descripcion_modulo").innerHTML = descripcion;	
	profesor_lider = document.getElementById("profesor_lider");
	document.getElementById("cod_modulo_eliminar").value = codigo_modulo;
	
	
			$.ajax({//AJAX PARA SESIONES
			type: "POST", /* Indico que es una petición POST al servidor */
			url: "<?php echo site_url("Modulos/obtenerSesionesVer") ?>", /* Se setea la url del controlador que responderá */
			data: { cod_mod_post: codigo_modulo},
			success: function(respuesta) { /* Esta es la función que se ejecuta cuando el resultado de la respuesta del servidor es satisfactorio */
				var tablaResultados = document.getElementById("sesiones");
				$(tablaResultados).empty();
				var arrayRespuesta = jQuery.parseJSON(respuesta);				
				var tr, td, th, thead,nodoTexto;
				thead = document.createElement('thead');
				tr = document.createElement('tr');
				th = document.createElement('th');
				nodoTexto = document.createTextNode("Nombre sesiones");
				th.appendChild(nodoTexto);
				tr.appendChild(th);
				thead.appendChild(tr);
				tablaResultados.appendChild(thead);
				for (var i = 0; i < arrayRespuesta.length; i++) {
					
						tr = document.createElement('tr');
						td = document.createElement('td');
						td.setAttribute('title', arrayRespuesta[i].DESCRIPCION_SESION);
						nodoTexto = document.createTextNode(arrayRespuesta[i].NOMBRE_SESION);
						td.appendChild(nodoTexto);
						tr.appendChild(td);
						tablaResultados.appendChild(tr);
				}

				/* Quito el div que indica que se está cargando */
				var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).hide();
				}
		});
		
		$.ajax({//AJAX PARA EQUIPO y lider
			type: "POST", /* Indico que es una petición POST al servidor */
			url: "<?php echo site_url("Modulos/obtenerProfesVer") ?>", /* Se setea la url del controlador que responderá */
			data: { cod_equipo_post: cod_equipo},
			success: function(respuesta) { /* Esta es la función que se ejecuta cuando el resultado de la respuesta del servidor es satisfactorio */
			//para equipo
			var tablaResultados = document.getElementById("equipo");
				$(tablaResultados).empty();
				var arrayRespuesta = jQuery.parseJSON(respuesta);
				var tr, td, th, thead,nodoTexto;
				thead = document.createElement('thead');
				tr = document.createElement('tr');
				th = document.createElement('th');
				nodoTexto = document.createTextNode("Nombre profesores");
				th.appendChild(nodoTexto);
				tr.appendChild(th);
				thead.appendChild(tr);
				tablaResultados.appendChild(thead);
				for (var i = 0; i < arrayRespuesta.length; i++){
					if(arrayRespuesta[i].LIDER_PROFESOR ==0){
						tr = document.createElement('tr');
						td = document.createElement('td');
						nodoTexto = document.createTextNode(arrayRespuesta[i].APELLIDO1_PROFESOR+" "+arrayRespuesta[i].APELLIDO2_PROFESOR+" "+arrayRespuesta[i].NOMBRE1_PROFESOR+" "+arrayRespuesta[i].NOMBRE2_PROFESOR);
						td.appendChild(nodoTexto);
						tr.appendChild(td);
						tablaResultados.appendChild(tr);
					}
					else{
						profesor_lider.innerHTML = arrayRespuesta[i].APELLIDO1_PROFESOR+" "+arrayRespuesta[i].APELLIDO2_PROFESOR+" "+arrayRespuesta[i].NOMBRE1_PROFESOR+" "+arrayRespuesta[i].NOMBRE2_PROFESOR;
					}
					
				}
			
				/* Quito el div que indica que se está cargando */
				var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).hide();
				}
				
		});
		$.ajax({//AJAX PARA requisitos
			type: "POST", /* Indico que es una petición POST al servidor */
			url: "<?php echo site_url("Modulos/obtenerRequisitosVer") ?>", /* Se setea la url del controlador que responderá */
			data: { cod_mod_post: codigo_modulo},
			success: function(respuesta) { /* Esta es la función que se ejecuta cuando el resultado de la respuesta del servidor es satisfactorio */
				var tablaResultados = document.getElementById("requisitos");
				$(tablaResultados).empty();
				var arrayRespuesta = jQuery.parseJSON(respuesta);
				var tr, td, th, thead,nodoTexto;
				thead = document.createElement('thead');
				tr = document.createElement('tr');
				th = document.createElement('th');
				nodoTexto = document.createTextNode("Nombre Requisitos");
				th.appendChild(nodoTexto);
				tr.appendChild(th);
				thead.appendChild(tr);
				tablaResultados.appendChild(thead);
				for (var i = 0; i < arrayRespuesta.length; i++) {
					
						tr = document.createElement('tr');
						td = document.createElement('td');
						td.setAttribute('title', arrayRespuesta[i].DESCRIPCION_REQUISITO);
						nodoTexto = document.createTextNode(arrayRespuesta[i].NOMBRE_REQUISITO);
						td.appendChild(nodoTexto);
						tr.appendChild(td);
						tablaResultados.appendChild(tr);
				}

				/* Quito el div que indica que se está cargando */
				var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).hide();
				}
		});
		/* Muestro el div que indica que se está cargando... */
		var iconoCargado = document.getElementById("icono_cargando");
		$(icono_cargando).show();

}
	function cargarModulos() {
		$.ajax({
			type: "POST", /* Indico que es una petición POST al servidor */
			url: "<?php echo site_url("Modulos/verModulosEditar") ?>", /* Se setea la url del controlador que responderá */
			success: function(respuesta) { /* Esta es la función que se ejecuta cuando el resultado de la respuesta del servidor es satisfactorio */
				var tablaResultados = document.getElementById("modulos");
				$(tablaResultados).empty();
				var arrayRespuesta = jQuery.parseJSON(respuesta);
				var tr, td, th, thead, nodoTexto;
				thead = document.createElement('thead');
				tr = document.createElement('tr');
				th = document.createElement('th');
				nodoTexto = document.createTextNode("Nombre módulo");
				th.appendChild(nodoTexto);
				tr.appendChild(th);
				thead.appendChild(tr);
				tablaResultados.appendChild(thead);
				
				for (var i = 0; i < arrayRespuesta.length; i++){
					tr = document.createElement('tr');
					td = document.createElement('td');
					tr.setAttribute("style", "cursor: pointer");
					tr.setAttribute("id", "modulo_"+arrayRespuesta[i].cod_mod);
					tr.setAttribute("onClick", "detalleModulo('"+arrayRespuesta[i].cod_mod+"','"+arrayRespuesta[i].descripcion+"','"+arrayRespuesta[i].cod_equipo+"','"+arrayRespuesta[i].nombre_mod+"')");
					nodoTexto = document.createTextNode(arrayRespuesta[i].nombre_mod);
					td.appendChild(nodoTexto);
					tr.appendChild(td);
					tablaResultados.appendChild(tr);
				}

				/* Quito el div que indica que se está cargando */
				var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).hide();
				}
		});

		/* Muestro el div que indica que se está cargando... */
		var iconoCargado = document.getElementById("icono_cargando");
		$(icono_cargando).show();
	}
		
	$(document).ready(cargarModulos);


</script>


<script type="text/javascript">
	function eliminarModulo(){
		if(document.getElementById("cod_modulo_eliminar").value == ""){
			
			$('#modalSeleccioneAlgo').modal();
		}
		else{
			$('#modalConfirmacion').modal();
		}
		/*var answer = confirm("¿Está seguro de eliminar este módulo?")
		if (!answer){
			return false;
		}
		else{

		var borrar = document.getElementById("FormBorrar");
		borrar.action ="<?php echo site_url("Modulos/hacerBorrarModulos/");?>"
		borrar.submit();
		}*/

	}

</script>


	<fieldset>
		<legend>Borrar Módulo</legend>
		<!--<form id="FormBorrar" type="post" onsubmit="eliminarModulo();return false" method="post">-->
		<?php
			$atributos= array('onsubmit' => 'return eliminarModulo()', 'id' => 'FormBorrar');
			echo form_open('Modulos/hacerBorrarModulos/', $atributos);
		?>
			
	  		<div class="row-fluid">
				<div class="span6">
					<div class="row-fluid">
						<div class="span7">
							1.- Seleccione el módulo temático que desea eliminar:
						</div>
					</div>


				<div class="row-fluid" style="margin-left: 0%; width:90%">
					<thead>
						<tr>
						
						</tr>
					</thead>


					<div style="border:#cccccc  1px solid;overflow-y:scroll;height:400px; -webkit-border-radius: 4px" ><!--  para el scroll-->
							<table id="modulos" class="table table-hover">
								<thead>

								</thead>
								<tbody>									
											
													
								</tbody>
							</table>
					</div>
				</div>	
			
		</div>
		
		<div class="span6" style="margin-left: 2%; padding: 0%;  ">
			<div class="row-fluid">
				<div class="span7">
					2.- Detalle módulo temático
				</div>
			</div>
			<div class ="row-fluid" style="">
				<pre style=" padding: 2%; height:6%">
Nombre del módulo:	<b id="nombre_modulo"></b>
Profesor lider: 	<b id="profesor_lider"></b>
Descripción módulo: <b id="descripcion_modulo"></b></pre>
<input value="" id="cod_modulo_eliminar" type="hidden" name="cod_modulo_eliminar">
				
			</div>
			<div class="row-fluid">
				<div class="span7">
					3.- Sesiones del módulo temático
				</div>
			</div>
			<div class="row-fluid">
				<div style="border:#cccccc 1px solid;overflow-y:scroll;height:100px; -webkit-border-radius: 4px" >																		
						<table id="sesiones" class="table table-hover">
							<thead>

							</thead>
							<tbody>									
										
												
							</tbody>
						</table>
				</div>
			</div>
			<div class="row-fluid">
				<div class="row-fluid" style="margin-top:2%">
						<div class="span7">
							4.- Profesores del módulo temático
						</div>
				</div>
			</div>
			<div class="row-fluid">
				<div style="border:#cccccc 1px solid;overflow-y:scroll;height:100px; -webkit-border-radius: 4px" >
									
						<table id="equipo" class="table table-hover">
							<thead>

							</thead>
							<tbody>									
										
												
							</tbody>
						</table>
				</div>
			</div>
			
			
			<div class="row-fluid">
				<div class="row-fluid" style="margin-top:2%">
						<div class="span7">
							5.- Requisitos del módulo temático
						</div>
				</div>
			</div>
			<div class="row-fluid">
				<div style="border:#cccccc 1px solid;overflow-y:scroll;height:100px; -webkit-border-radius: 4px" >
									
						<table id="requisitos" class="table table-hover">
							<thead>

							</thead>
							<tbody>									
										
												
							</tbody>
						</table>
				</div>
			</div>
			
			<div class="row-fluid" style="margin-top: 2%; ">

					<div class="controls pull-right">
						<button class="btn" type="button"  onclick="eliminarModulo()" style="width: 93px">
							<i class= "icon-trash"></i>

							&nbsp Borrar
						</button>
					

					
						<button  class ="btn" onclick="Cancelar();return false" style="width: 105px">
							<div class= "btn_with_icon_solo">Â</div>
							&nbsp Cancelar
						</button>
					</div>

			</div>

			<!-- Modal de Confirmación -->
			<div id="modalConfirmacion" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Confirmación</h3>
				</div>
				<div class="modal-body">
					<p>Se va a eliminar un módulo ¿Está seguro?</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn"><div class="btn_with_icon_solo">Ã</div>&nbsp; Aceptar</button>
					<button class="btn" type="button" data-dismiss="modal"><div class="btn_with_icon_solo">Â</div>&nbsp; Cancelar</button>
					
				</div>
			</div>

			<!-- Modal de seleccionaAlgo -->
			<div id="modalSeleccioneAlgo" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>No ha seleccionado ningun módulo</h3>
				</div>
				<div class="modal-body">
					<p>Por favor seleccione un módulo y vuelva a intentarlo</p>
				</div>
				<div class="modal-footer">
					<button class="btn" type="button" data-dismiss="modal">Cerrar</button>
				</div>
			</div>

			
		</div>
	    </div>
	    <?php echo form_close(''); ?>
		<!--</form>-->
	</fieldset>
