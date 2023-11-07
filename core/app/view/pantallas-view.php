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
				title: {text: 'Administracion de Pantallas',style: {'text-align': 'center','font-size': '15px'}},
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
					{index: 'codigo',title: 'CODIGO'},
					{index: 'marca',title: 'MARCA',type: 'combo',data: ['',<?php foreach(MarcaData::getAll() as $p){ ?>'<?php echo $p->descripcion; ?>',<?php } ?>]},
					{index: 'modelo',title: 'MODELO'},
					{index: 'serial',title: 'SERIAL'},					
					{index: 'dimension',title: 'DIMENSION'},  
					{index: 'estado',title: 'ESTADO',type: 'switcher',width: 75}
				]
			});
		});
		var data = [
			<?php $pantallas = PantallaData::getAll();  ?>
			<?php foreach($pantallas as $pantalla){ ?>
				{
					consultar: "<a style='padding:2px 5px 2px 5px; color:white' class='btn btn-simple btn-info btn-xs' onclick='consultar(<?php echo $pantalla->id; ?>);' ><i class='ti-eye' aria-hidden='true'></i></a>",
					codigo: '<?php echo $pantalla->id; ?>',
					marca: '<?php $marca=MarcaData::getById($pantalla->id_marca);echo $marca->descripcion;?>',
					modelo: '<?php echo $pantalla->modelo; ?>',
					serial: '<?php echo $pantalla->serial; ?>',
					dimension: '<?php echo $pantalla->dimension; ?>',
					estado: <?php if($pantalla->id_estado==1){ echo "true"; }else{ echo "false"; } ?>
				},
			<?php } ?>
		];
	</script>
	<div class="row">
		<div class="col-lg-12">
			<div class="animated">
				<div class="card">
					<div class="card-header twt-feed blue-bg">
						<h4 class="title">Gestion de Pantallas</h4>
					</div>
					<div class="card-body">
						<div class="btn-group">
							<a href="./?view=new_pantalla" class="btn btn-app bg-info" target="_blank"><i class="fas ti-ticket"></i>Nueva Pantalla</a>
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
				<h4 class="modal-title" id="scrollmodalLabel">Información de la Pantalla</h4>
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
							<form class="form-horizontal" autocomplete="off" method="post" action="" role="form">
							  <div class="row form-group">
									<div class="col-md-12">
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Codigo:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='id_pantalla' id='id_pantalla' class="form-control" disabled style="border: 0;">
											</div>
										</div>
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
												<label class="control-label">Serial:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='serial' id='serial' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-2">
												<label class="control-label">Dimension:</label>
											</div>
											<div class="col-md-5">
												<input type="text" name='dimension' id='dimension' class="form-control" disabled style="border: 0;">
											</div>
										</div>
										<label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
										<div class="col-md-4">
											<input type="checkbox" style="display: block;width: 25px;height: 25px;" name="is_active" id="is_active">
										</div>									
									</div>
									<div class="row form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<input type="hidden" name="id_pantalla" id="id_pantalla">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
			url: "?action=consultar_pantalla",
			type: "POST",
			data: {id:id},
			dataType: "json",
			success:  function (response) {
				for ( x in response.data) {
					    $('#documento #id_pantalla').val(response.data[x].id);
						$('#documento #id_marca').val(response.data[x].id_marca);
						$('#documento #modelo').val(response.data[x].modelo);
						$('#documento #serial').val(response.data[x].serial);
						$('#documento #dimension').val(response.data[x].dimension);
						if(response.data[x].id_estado==1){
							$('#documento #is_active').prop( "checked", true );
						}
					}
					document.getElementById("btn_documento").click();
			}
		});
}
</script>
<?php } else{ print "<script>window.location='?view=home';</script>"; } ?>																																							