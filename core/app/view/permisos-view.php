<?php if($_SESSION['profile_sorteio']==1){ ?>
<script src="fancygrid/fancy.full.js"></script>
<script type="text/javascript" src="CC/jquery.min.js"></script>
<style>
.fancy-grid-cell-inner {
    margin-left: 9px;
    margin-top: 5px;
    margin-right: 9px;
    font-weight: 400;
}
.fancy-bar-button {
    background-color: #d9e0e7;
}
</style>
<style>
.form-group {
    margin-bottom: 0 !important;
}

	.modal-lg {
		max-width: 90%;
	}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
  Fancy.defineControl('mycontrol', {
    controls: [{
      event: 'cellclick',
      selector: '.my-button',
      handler: 'onClickMyButton'
    }],
    onClickMyButton: function(grid, o){
    	//alert(o.id, o.data.loading);
		consultar(o.id);
    	grid.update(); 
    }
  });
  new FancyGrid({
    title: {
      text: '',
      style: {
        'text-align': 'center',
		'font-size': '20px'
      }
    },
    renderTo: 'container',
    height: 'fit',
    data: data,
	//multiSort: true,
    //selModel: 'row',
    //trackOver: true,
    controllers: ['mycontrol'],
    dirtyEnabled: false,
    theme: 'bootstrap',
	i18n:'es',
	lang:{
		autoSizeColumn: 'Ajustar Columna',
		autoSizeColumns: 'Ajustar Todo',
		sortAsc: 'Ascendente',
		sortDesc: 'Descendente',
		lock: 'Inmovilizar',
		unlock: 'Movilizar',
		rightLock: 'Inmovilizar a la Derecha'
	},
	paging: {
      barType: 'both',
	  pageSize: 10,
      pageSizeData: [5, 10, 20, 50],
	  refreshButton: true
    },
    defaults: {
      type: 'string',
      width: 100,
      resizable: true,
      sortable: true,
      menu: ['size', '-', 'columns', '-', 'lock'],
	  filter: {
        header: true,
        emptyText: 'Buscar',
		type:'combo'
      }
    },
	contextmenu: [
      'copy',
      'copy+'
    ],
	exporter: true,
    subTBar: [{
      text: 'Excel',
      handler: function() {
        this.exportToExcel({
          fileName: 'Usuarios BDSoft',
          header: true
        });
      }
    }],
	selModel: {
      type: 'cell',
      memory: true
    },
    columns: [
		{
		  index: 'id',
		  title: 'Nit',
		  type: 'number'
		}, {
		  index: 'name',
		  title: 'Nombre Completo'
		}, {
		  index: 'email',
		  title: 'Correo',
		  hidden: true
		}, {
		  index: 'username',
		  title: 'Usuario',
		  hidden: true
		}, {
		  index: 'estado',
		  title: 'Estado',
		  type: 'switcher',
		  hidden: true
		}, {
		  index: 'perfil',
		  title: 'Perfil',
		  hidden: true
		}, {
		  index: 'last_login',
		  title: 'Ultimo Acceso',
		  type: 'date',
		  hidden: true
		}, {
			width: 50,
		    cls: 'my-column-action',
		    index: 'loading',
		    exportable: false,
		    filter: false,
		    locked: true,
		    menu:false,
		    render: function(o){
				o.value = "";
				o.value='<button style="padding:2px 5px 2px 5px" class="btn btn-simple btn-warning btn-xs my-button"><i class="fa fa-pencil-square-o my-button" aria-hidden="true"></i></button>';
				return o;
		  }
		},
		<?php $modulos = PermisosData::getModulos(); foreach($modulos as $modulo_activo){ ?>
		{
		  index: 'modulo_<?php echo $modulo_activo->id; ?>',
		  title: '<?php echo $modulo_activo->name; ?>',
		  type: 'switcher'
		},
		<?php } ?>
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
		<?php $modulos = PermisosData::getModulos(); foreach($modulos as $modulo_activo){ ?> 
		<?php echo "modulo_".$modulo_activo->id.":"; ?>
		<?php $modulo=PermisosData::getById($modulo_activo->id,$user->id); if(isset($modulo->id_modulo)){ echo 'true,'; }else{ echo "false,"; } } ?>
						
	  },
	<?php } ?>
];
</script>
<div class="row">
<div class="col-lg-12">
<div class="animated">
	<div class="card">
		<div class="card-header twt-feed blue-bg">
			<h4 class="title">Permisos</h4>
		</div>
		<div class="card-body">
			<button type="button" id="editar" style="display:none" class="btn btn-info mb-1" data-toggle="modal" data-target="#edit">Nuevo Usuario</button>
				<div class="table-responsive">
				<div id="container"></div>
				</div>
		</div>
	</div>
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="col-md-10">
					<h4 class="modal-title" id="scrollmodalLabel">EDITAR PERMISOS</h4>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" autocomplete="off" method="post" action="index.php?action=updatepermiso" role="form">
						<div class="row form-group">
							<div class="col-md-12">
								<table style="width:100%;">
									<tr style="height:50px;">
										<td colspan="2" id="info" class="text-center"></td>
									</tr>
								</table>
								<hr>
								<?php $menus = PermisosData::getMenu(); foreach($menus as $menu){ ?>
								<div class="row form-group">
								<div class="col-lg-12" style="background:#2a3542;color:white;padding-top: 10px;padding-bottom: 10px;margin-bottom: 10px;">
											<table>
												<tr>
													<td style="width:100%;">
														<h4 style="color:white;"><?php echo $menu->name; ?></h4>
													</td>
													<td>
														<?php if($menu->id!=100){ ?>
														<label class="switch">						
															<input type="checkbox" name="<?php echo $menu->id; ?>" id="<?php echo $menu->id; ?>" />
															<span class="slider round red"></span>
														</label>
														<?php } ?>
													</td>
												</tr>
											</table>
								</div>
								</div>
								<div class="row form-group">
									<?php $modulos = PermisosData::getModulosByMenu($menu->id); foreach($modulos as $modulo_activo){ ?>
									<?php if($menu->id!=$modulo_activo->id){ ?>
										<div class="col-lg-6">
											<table>
												<tr>
													<td style="width:100%;">
														<label for="text-input" class="form-control-label"><?php echo $modulo_activo->name; ?>:</label>
													</td>
													<td>
														<label class="switch">
															<input type="checkbox" name="<?php echo $modulo_activo->id; ?>" id="<?php echo $modulo_activo->id; ?>" />							
															<span class="slider round blue"></span>
														</label>
													</td>
												</tr>
											</table>
										</div>
									<?php } ?>
									<?php } ?>
								</div>
								<?php } ?>
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
						$('#edit #id_project').val(response.data[x].id_project);
						$('#edit #id_category').val(response.data[x].id_category);
						$('#edit #id_position').val(response.data[x].id_position);
						$('#edit #id_profile').val(response.data[x].id_profile);
						if(response.data[x].is_active==1){
						$('#edit #is_active').prop( "checked", true );
						}
						$('#edit #user_id').val(response.data[x].id);
						<?php $modulos = PermisosData::getModulos(); foreach($modulos as $modulo_activo){ ?>
						$('#edit #<?php echo $modulo_activo->id; ?>').prop( "checked", response.data[x].modulo_<?php echo $modulo_activo->id; ?> );
						<?php } ?>
						var elemento = document.getElementById("info");
						while (elemento.firstChild) {
							elemento.removeChild(elemento.firstChild);
						}
						var capa = document.getElementById("info");
						capa.innerHTML+='<h4>'+response.data[x].name+' '+response.data[x].lastname+'</4>';
					}
					document.getElementById("editar").click();
			}
		});
}
</script>
<?php } else{ print "<script>window.location='?view=home';</script>"; } ?>