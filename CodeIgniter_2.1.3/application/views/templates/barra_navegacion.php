<!-- Barra con los botones undo y redo. barra_navegacion -->
<div class="row pull-top undoredo" style="min-width:600px; width:600px">
	<div class="col-md-1">
		<div class="btn btn_with_icon_solo undo" disabled title="Deshacer">
			<img src="/<?php echo config_item('dir_alias') ?>/img/icons/undo2.png" alt="9" style="width: 15px; height: 15px;">
		</div>
	</div>
	<div class="col-md-1">
		<div class="btn btn_with_icon_solo redo" disabled title="Rehacer">
			<img src="/<?php echo config_item('dir_alias') ?>/img/icons/redo2.png" alt=":" style="width: 15px; height: 15px;">
		</div>
	</div>
	<div class="col-md-1">
			<img id="icono_cargando" src="/<?php echo config_item('dir_alias') ?>/img/procesando.gif" style="display:none; width:25px; height:25px;">
	</div>
</div>