<?php if($_SESSION['profile_sorteio']==1){ ?>
	<script src="fancygrid/fancy.full.js"></script>
		<script type="text/javascript" language="javascript" src="DataTables/jquery.js"></script>
	<link href="DataTables/jquery.dataTables.css" rel="stylesheet"/>
	<link href="DataTables/autoFill.dataTables.css" rel="stylesheet"/>
	<link href="DataTables/buttons.dataTables.css" rel="stylesheet"/>
	<link href="DataTables/fixedColumns.dataTables.css" rel="stylesheet"/>
	<script src="DataTables/jszip.js"></script>
	<script src="DataTables/pdfmake.js"></script>
	<script src="DataTables/vfs_fonts.js"></script>
	<script src="DataTables/jquery.dataTables.js"></script>
	<script src="DataTables/dataTables.autoFill.js"></script>
	<script src="DataTables/dataTables.buttons.js"></script>
	<script src="DataTables/buttons.colVis.js"></script>
	<script src="DataTables/buttons.html5.js"></script>
	<script src="DataTables/buttons.print.js"></script>
	<script src="DataTables/dataTables.fixedColumns.js"></script>
	<script src="assets/js/funciones/equipos.js"></script> 
	<style>
		.modal-lg {
			max-width: 90%;
		}
		.fancy-grid-cell-inner {
			margin-left: 9px;
			margin-top: 5px;
			margin-right: 9px;
			font-weight: 400;
		}
		.fancy-bar-button {
			background-color: #d9e0e7;
		}
		.wrapper{
			float: right;
			width: 100%;
		}
	</style>
	<script type="text/javascript" language="javascript" class="init">
		window.onload=function() {
			$("body").attr("class", "sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse");
		}
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			new FancyGrid({
				title: {text: 'Administracion de Equipos',style: {'text-align': 'center','font-size': '15px'}},
				renderTo: 'container',
				height: 'fit',
				data: data,
				multiSort: true,
				dirtyEnabled: false,
				theme: 'bootstrap',
				i18n:'es',
				lang:{autoSizeColumn: 'Ajustar Columna',autoSizeColumns: 'Ajustar Todo',sortAsc: 'Ascendente',sortDesc: 'Descendente',lock: 'Inmovilizar',unlock: 'Movilizar',rightLock: 'Inmovilizar a la Derecha'},
				paging: {barType: 'both',pageSize: 10,pageSizeData: [5, 10, 20, 50],refreshButton: true},
				defaults: {type: 'string',width: 100,resizable: true,sortable: true,menu: ['size', '-', 'columns', '-', 'lock'],filter: {header: true,emptyText: 'Buscar',type:'combo'}},
				contextmenu: ['copy', 'copy+'],
				exporter: true,
				subTBar: [{text: 'Excel',handler: function() {this.exportToExcel({fileName: 'Rifas',header: true,all: true});}}],
				selModel: {type: 'cell', memory: true},
				columns: [
					{index: 'consultar', title: 'Ver', type: 'text', cellTip: '{title}',align: 'center',filter: false, resizable: true, autoHeight: true, cellAlign: 'center',exportable: false,menu:false,sortable: false,width: 75},
					{index: 'editar', title: 'Editar', type: 'text', cellTip: '{title}',align: 'center',filter: false, resizable: true, autoHeight: true, cellAlign: 'center',exportable: false,menu:false,sortable: false,width: 75},
					{index: 'marca',title: 'MARCA',type: 'combo',data: ['',<?php foreach(MarcaData::getAll() as $p){ ?>'<?php echo $p->descripcion; ?>',<?php } ?>]},
					{index: 'tipo',title: 'TIPO',type: 'combo',data: ['',<?php foreach(ProfileData::getAllTipo() as $p){ ?>'<?php echo $p->descripcion; ?>',<?php } ?>]},
					{index: 'serial',title: 'SERIAL',hidden:true},
					{index: 'modelo',title: 'MODELO'},
					{index: 'procesador',title: 'PROCESADOR',hidden:true},
					{index: 'ram',title: 'RAM',width: 65},
					{index: 'disco',title: 'DISCO DURO',width: 65},
					{index: 'mac_e',title: 'MAC ETHERNET',hidden:true},
					{index: 'mac_w',title: 'MAC WI-FI',hidden:true}, 
					{index: 'arqui',title: 'ARQUITECTURA',type: 'combo',data: ['',<?php foreach(ProfileData::getAllArqui() as $p){ ?>'<?php echo $p->descripcion; ?>',<?php } ?>],width: 75},
					{index: 'pantalla',title: 'PANTALLA',type: 'combo',data: ['',<?php foreach(ProfileData::getAllPantalla() as $p){ ?>'<?php echo $p->modelo; ?>',<?php } ?>],width: 75},   
					{index: 'estado',title: 'ESTADO',type: 'switcher',width: 75},
					{index: 'polucion',title: 'POLUCION',type: 'combo',data: ['',<?php foreach(ProfileData::getAllPolucion() as $p){ ?>'<?php echo $p->descripcion; ?>',<?php } ?>],width: 75,hidden:true},
					{index: 'so',title: 'SISTEMA OPERATIVO',type: 'combo',data: ['',<?php foreach(ProfileData::getAllSO() as $p){ ?>'<?php echo $p->descripcion; ?>',<?php } ?>]},
					{index: 'serial_so',title: 'SERIAL SO',width: 125,hidden:true}, 
					{index: 'version_o',title: 'VERSION OFFICE',type: 'combo',data: ['',<?php foreach(ProfileData::getAllVersionO() as $p){ ?>'<?php echo $p->descripcion; ?>',<?php } ?>],width: 125},
					{index: 'serial_o',title: 'SERIAL OFFICE',width: 125,hidden:true}, 
					{index: 'fecha_c',title: 'FECHA DE COMPRA',type: 'date',width: 80},
					{index: 'fecha_g',title: 'FIN DE GARANTIA',type: 'date',width: 80,hidden:true},
					{index: 'usuario',title: 'USUARIO',type: 'combo',data: ['',<?php foreach(UserData::getAll() as $p){ ?>'<?php echo $p->name; ?>',<?php } ?>]},
					{index: 'activo',title: 'ACTIVO',width: 80,hidden:true}, 
				]
			});
		});
		var data = [
			<?php $equipos = EquiposData::getAll();  ?>
			<?php foreach($equipos as $equipo){ ?>
				{
					consultar: "<a style='padding:2px 5px 2px 5px; color:white' class='btn btn-simple btn-info btn-xs' onclick='consultar(<?php echo $equipo->id; ?>);' ><i class='ti-eye' aria-hidden='true'></i></a>",
					editar: "<a style='padding:2px 5px 2px 5px; color:white' class='btn btn-simple btn-warning btn-xs' onclick='editar(<?php echo $equipo->id; ?>);' ><i class='fa fa-folder' aria-hidden='true'></i></a>",
					marca: '<?php $marca=MarcaData::getById($equipo->id_marca);echo $marca->descripcion;?>',
					tipo: '<?php $tipo=ProfileData::getByTipo($equipo->id_tipo);echo $tipo->descripcion;?>',
					serial: '<?php echo $equipo->serial; ?>',
					modelo: '<?php echo $equipo->modelo; ?>',
					procesador: '<?php echo $equipo->procesador; ?>',
					ram: '<?php echo $equipo->ram; ?>',
					disco: '<?php echo $equipo->disco_duro; ?>',
					mac_e: '<?php echo $equipo->mac_ethernet; ?>',
					mac_w: '<?php echo $equipo->mac_wifi; ?>',
					arqui: '<?php $arqui=ProfileData::getByArqui($equipo->id_arquitectura);echo $arqui->descripcion;?>',
					pantalla: '<?php $pantalla=ProfileData::getByPantalla($equipo->id_pantalla);echo $pantalla->modelo;?>',
					estado: <?php if($equipo->id_estado==1){ echo "true"; }else{ echo "false"; } ?>,
					polucion: '<?php $polucion=ProfileData::getByPolucion($equipo->id_polucion);echo $polucion->descripcion;?>',
					so: '<?php $so=ProfileData::getBySO($equipo->id_so);echo $so->descripcion;?>',
					serial_so: '<?php echo $equipo->serial_so; ?>',
					version_o: '<?php $version_o=ProfileData::getByVersionO($equipo->id_office);echo $version_o->descripcion;?>',
					serial_o: '<?php echo $equipo->serial_office; ?>',
					fecha_c: '<?php echo date("d/m/Y", strtotime($equipo->fecha_compra)); ?>',
					fecha_g: '<?php echo date("d/m/Y", strtotime($equipo->fecha_fin_garantia)); ?>',
					usuario: '<?php $usuario=UserData::getById($equipo->id_user);echo $usuario->name;?>',
					activo: '<?php echo $equipo->activo_fijo; ?>'
				},
			<?php } ?>
		];
	</script>
	<div class="row">
		<div class="col-lg-12">
			<div class="animated">
				<div class="card">
					<div class="card-header twt-feed blue-bg">
						<h4 class="title">Gestion de Equipos</h4>
					</div>
					<div class="card-body">
						<div class="btn-group">
							<a href="./?view=new_equipo" class="btn btn-app bg-info" target="_blank"><i class="fas ti-ticket"></i>Nuevo Equipo</a>
						</div>
						<hr>
						<div class="table-responsive">
							<div id="container"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<button type="button" id="btn_documento" style="display:none" class="btn btn-primary mb-1" data-toggle="modal" data-target="#documento">Ver Documento</button>
<div class="modal fade" id="documento" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="col-md-4">
				<h4 class="modal-title" id="scrollmodalLabel">Información del Equipo</h4>
				</div>
				<button type="button" id="close_credito" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="zoom:0.8">
				<div class="row form-group">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header text-light bg-dark">
								<h4>EQUIPO</h4>
							</div>
							<div class="card-body">
							<form class="form-horizontal" autocomplete="off" method="post" action="index.php?action=updaterifas" role="form">
							  <div class="row form-group">
									<div class="col-md-12">
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Marca:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='id_marca' id='id_marca' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Modelo:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='modelo' id='modelo' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Procesador:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='procesador' id='procesador' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Ram:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='ram' id='ram' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Disco Duro:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='disco_duro' id='disco_duro' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Serial:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='serial' id='serial' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Mac Ethernet:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='mac_ethernet' id='mac_ethernet' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Mac Wifi:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='mac_wifi' id='mac_wifi' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Hostname:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='hostname' id='hostname' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Fecha Compra:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='fecha_compra' id='fecha_compra' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Fecha Fin Garantia:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='fecha_fin_garantia' id='fecha_fin_garantia' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Usuario:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='usuario' id='usuario' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
										<div class="col-md-4">
											<input type="checkbox" style="display: block;width: 25px;height: 25px;" name="is_active" id="is_active">
										</div>									
									</div>
									<div class="row form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<input type="hidden" name="id_rifa" id="id_rifa">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<button type="submit" class="btn btn-primary">Anular</button>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="display:none;" id="datos_documentos">
</div>
<script>
function consultar(id){
	$.ajax({
			url: "?action=consultar_equipo",
			type: "POST",
			data: {id:id},
			dataType: "json",
			success:  function (response) {
				for ( x in response.data) {
					    $('#documento #id_equipo').val(response.data[x].id);
						$('#documento #id_marca').val(response.data[x].id_marca);
						$('#documento #modelo').val(response.data[x].modelo);
						$('#documento #procesador').val(response.data[x].procesador);
						$('#documento #ram').val(response.data[x].ram);
						$('#documento #disco_duro').val(response.data[x].disco_duro);
						$('#documento #serial').val(response.data[x].serial);
						$('#documento #mac_ethernet').val(response.data[x].mac_ethernet);
						$('#documento #mac_wifi').val(response.data[x].mac_wifi);
						$('#documento #hostname').val(response.data[x].hostname);
						$('#documento #fecha_compra').val(response.data[x].fecha_compra);
						$('#documento #fecha_fin_garantia').val(response.data[x].fecha_fin_garantia);
						if(response.data[x].id_estado==1){
							$('#documento #is_active').prop( "checked", true );
						}
						$('#documento #usuario').val(response.data[x].id_user);
					}
					document.getElementById("btn_documento").click();
			}
		});
}
</script>
<?php } else{ print "<script>window.location='?view=home';</script>"; } ?>																																							