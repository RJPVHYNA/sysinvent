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
				title: {text: 'Administracion de Usuarios',style: {'text-align': 'center','font-size': '15px'}},
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
				subTBar: [{text: 'Excel',handler: function() {this.exportToExcel({fileName: 'Usuarios Nomada',header: true,all: true});}}],
				selModel: {type: 'cell', memory: true},
				columns: [
					{index: 'consultar', title: 'Ver', type: 'text', cellTip: '{title}',align: 'center',filter: false, resizable: true, autoHeight: true, cellAlign: 'center',exportable: false,menu:false,sortable: false,width: 75},
					{index: 'id',title: 'Nit',type: 'number'}, 
					{index: 'name',title: 'Nombre Completo',width: 200}, 
					{index: 'email',title: 'Correo'}, 
					{index: 'username',title: 'Usuario'}, 
					{index: 'estado',title: 'Estado',type: 'switcher'}, 
					{index: 'perfil',title: 'Perfil',type: 'combo',data: ['',<?php foreach(ProfileData::getAll() as $p){ ?>'<?php echo $p->name; ?>',<?php } ?>],width: 200}, 
					{index: 'last_login',title: 'Ultimo Acceso',type: 'date'},
				]
			});
		});
		var data = [
			<?php $users = UserData::getAll();  ?>
			<?php foreach($users as $user){ ?>
				{
					id: <?php echo $user->id; ?>,
					name: '<?php echo $user->name." ".$user->lastname; ?>',
					email: '<?php echo $user->email; ?>',
					username: '<?php echo $user->username; ?>',
					estado: <?php if($user->is_active==1){ echo "true"; }else{ echo "false"; } ?>,
					perfil: '<?php $perfil=ProfileData::getById($user->id_profile);echo $perfil->name;?>',
					last_login: '<?php echo date("d/m/Y", strtotime($user->last_login)); ?>',
					consultar: "<a style='padding:2px 5px 2px 5px; color:white' class='btn btn-simple btn-warning' onclick='consultar(<?php echo $user->id; ?>);' ><i class='ti-pencil' aria-hidden='true'></i></a>",
				},
			<?php } ?>
		];
	</script>
	<div class="row">
		<div class="col-lg-12">
			<div class="animated">
				<div class="card">
					<div class="card-header twt-feed blue-bg">
						<h4 class="title">Gestion de Usuarios</h4>
					</div>
					<div class="card-body">
						<div class="btn-group">
							<a class="btn btn-app bg-info" data-toggle="modal" data-target="#scrollmodal"><i class="fas ti-user"></i> Crear Usuario</a>
							<a class="btn btn-app bg-olive" onclick="propiedad('profile');"><i class="fas ti-agenda"></i> Perfiles</a>
						</div>
						<hr>
						<div class="table-responsive">
							<div id="container"></div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<div class="col-md-4">
									<h4 class="modal-title" id="scrollmodalLabel">Nuevo usuario</h4>
								</div>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" method="post" action="index.php?action=adduser" autocomplete="off" role="form">
									<div class="row form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Cedula</label>
										<div class="col-md-4">
											<input type="text" name="id" class="form-control" placeholder="Cedula" required>
										</div>
										<label for="inputEmail1" class="col-lg-2 control-label">Correo</label>
										<div class="col-md-4">
											<input type="text" name="email" class="form-control" placeholder="Email" required>
										</div>
									</div>
									<div class="row form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
										<div class="col-md-4">
											<input type="text" name="name" class="form-control"  placeholder="Nombre" required>
										</div>
										<label for="inputEmail1" class="col-lg-2 control-label">Apellido</label>
										<div class="col-md-4">
											<input type="text" name="lastname" class="form-control" placeholder="Apellido" required>
										</div>
									</div>
									<div class="row form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Usuario</label>
										<div class="col-md-4">
											<input type="text" name="username" class="form-control" placeholder="Nombre de usuario" required>
										</div>
										<label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
										<div class="col-md-4">
											<input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a" required>
										</div>
									</div>
									<div class="row form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Perfil</label>
										<div class="col-md-4">
											<select name="id_profile" class="form-control" required>
												<option value="">-- SELECCIONE --</option>
												<?php foreach(ProfileData::getAll() as $p):?>
												<option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
												<?php endforeach; ?>
											</select> 
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary">Crear</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<button type="button" id="editar" style="display:none" class="btn btn-info mb-1" data-toggle="modal" data-target="#edit"></button>
				<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<div class="col-md-4">
									<h4 class="modal-title" id="scrollmodalLabel">Editar de usuario</h4>
								</div>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" autocomplete="off" method="post" action="index.php?action=updateuser" role="form">
									<div class="row form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
										<div class="col-md-4">
											<input type="text" name="name" id="name" class="form-control"  placeholder="Nombre">
										</div>
										<label for="inputEmail1" class="col-lg-2 control-label">Apellido</label>
										<div class="col-md-4">
											<input type="text" name="lastname" id="lastname" required class="form-control"  placeholder="Apellido">
										</div>
									</div>
									<div class="row form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Usuario</label>
										<div class="col-md-4">
											<input type="text" name="username" id="username" class="form-control" required  placeholder="Nombre de usuario">
										</div>
										<label for="inputEmail1" class="col-lg-2 control-label">Email</label>
										<div class="col-md-4">
											<input type="text" name="email" id="email" class="form-control"  placeholder="Email">
										</div>
									</div>
									<div class="row form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
										<div class="col-md-4">
											<select name="id_profile" id="id_profile" class="form-control" required>
												<option value="">-- SELECCIONE --</option>
												<?php foreach(ProfileData::getAll() as $p):?>
												<option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
												<?php endforeach; ?>
											</select> 
										</div>
									</div>
									<div class="row form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
										<div class="col-md-4">
											<input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a">
											<p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
										</div>
										<label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
										<div class="col-md-4">
											<input type="checkbox" style="display: block;width: 25px;height: 25px;" name="is_active" id="is_active">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<input type="hidden" name="user_id" id="user_id">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<button type="submit" class="btn btn-primary">Actualizar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<button type="button" id="propiedades" style="display:none" class="btn btn-info mb-1" data-toggle="modal" data-target="#propiedad"></button>
				<div class="modal fade" id="propiedad" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<div class="col-md-4">
									<h4 class="modal-title" id="titulo"></h4>
								</div>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="contenido_modal">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function consultar(id){
			$.ajax({
				url: "?action=consultar_usuario",
				type: "POST",
				data: {id:id},
				dataType: "json",
				success:  function (response) {
					for ( x in response.data) {
						$('#edit #name').val(response.data[x].name);
						$('#edit #lastname').val(response.data[x].lastname);
						$('#edit #username').val(response.data[x].username);
						$('#edit #email').val(response.data[x].email);
						$('#edit #id_profile').val(response.data[x].id_profile);
						if(response.data[x].is_active==1){
							$('#edit #is_active').prop( "checked", true );
						}
						$('#edit #user_id').val(response.data[x].id);
					}
					document.getElementById("editar").click();
				}
			});
		}
	</script>
	<script>
		function propiedad(id){
			$.ajax({
				url: "?action=propiedades",
				type: "POST",
				data: {id:id},
				success:  function (resultado) {
					var elemento = document.getElementById('contenido_modal');
					while (elemento.firstChild) {
					  elemento.removeChild(elemento.firstChild);
					}
					var capa = document.getElementById('contenido_modal');
					capa.innerHTML+=''+resultado+'';
					let table = new DataTable('#example', {
						dom: '<"wrapper"l>Bfrtip',
						buttons: [
							'colvis','copy', 'csv', 'excel', 'pdf', 'print'
						],
						language: {
							url: 'DataTables/es-ES.json',
						},
					});
					 var nombre_propiedad="";
					if(id=="profile"){ nombre_propiedad="Administracion Perfiles"; }
					
					var elemento = document.getElementById('titulo');
					while (elemento.firstChild) {
					  elemento.removeChild(elemento.firstChild);
					}
					var capa = document.getElementById('titulo');
					capa.innerHTML+=''+nombre_propiedad+'';
					
					document.getElementById("propiedades").click();
				}
			});
		};
		
		function consultar_propiedad(id,name){
			$('#editar_propiedad #id').val(id);
			$('#editar_propiedad #name').val(name);
			document.getElementById("btn_editar_propiedad").click();
		};
	</script>
<?php } else{ print "<script>window.location='?view=home';</script>"; } ?>																																							