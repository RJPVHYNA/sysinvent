<?php if(isset($_POST["id"])){ ?>
	{
		"data": [
			<?php $usuario =  UserData::getById($_POST["id"]); if($usuario){ ?>
			{
				"id": "<?php echo $usuario->id; ?>",
				"username": "<?php echo $usuario->username; ?>",
				"name": "<?php echo $usuario->name; ?>",
				"lastname": "<?php echo $usuario->lastname; ?>",
				"email": "<?php echo $usuario->email; ?>",
				"password": "<?php echo $usuario->password; ?>",
				"is_active": "<?php echo $usuario->is_active; ?>",
				"created_at": "<?php echo $usuario->created_at; ?>",
				"id_profile": "<?php echo $usuario->id_profile; ?>",
				"last_login": "<?php echo $usuario->last_login; ?>",
				<?php $modulos = PermisosData::getModulos(); $cont = count($modulos); $contador=1; foreach($modulos as $modulo_activo){ ?>
				"modulo_<?php echo $modulo_activo->id; ?>": "<?php $modulo=PermisosData::getById($modulo_activo->id,$usuario->id); if(isset($modulo->id_modulo)){ echo "true"; } else{ "false"; }?>" <?php if($contador <> $cont){?>, <?php } ?>
			<?php $contador++;?>
				<?php } ?>
			} 
			<?php } ?>
		]
	}
<?php } ?>