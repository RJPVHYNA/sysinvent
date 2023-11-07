<?php if(isset($_POST["id"])){ ?>
	{
		"data": [
			<?php $documento =  EquiposData::getById($_POST["id"]); if($documento){?>
			{
				"id": "<?php echo $documento->id; ?>",
				"id_marca": "<?php $id_marca=MarcaData::getById($documento->id_marca); echo $id_marca->descripcion; ?>",
				"modelo": "<?php echo $documento->modelo; ?>",
				"procesador": "<?php echo $documento->procesador; ?>",
				"ram": "<?php echo $documento->ram; ?>",
				"disco_duro": "<?php echo $documento->disco_duro; ?>",
				"serial": "<?php echo $documento->serial; ?>",
				"mac_ethernet": "<?php echo $documento->mac_ethernet; ?>",
				"mac_wifi": "<?php echo $documento->mac_wifi; ?>",
				"hostname": "<?php echo $documento->hostname; ?>",
				"fecha_compra": "<?php echo $documento->fecha_compra; ?>",
				"fecha_fin_garantia": "<?php echo $documento->fecha_fin_garantia; ?>",
				"id_tipo": "<?php $id_tipo=TypeData::getById($documento->id_tipo); echo $id_tipo->descripcion; ?>",
				"id_so": "<?php $id_so=SistemaData::getById($documento->id_so); echo $id_so->descripcion; ?>",
				"serial_so": "<?php echo $documento->serial_so; ?>",
				"id_pantalla": "<?php $id_pantalla=PantallaData::getById($documento->id_pantalla); echo $id_pantalla->modelo; ?>",
				"id_arquitectura": "<?php $id_arquitectura=ArquitecData::getById($documento->id_arquitectura); echo $id_arquitectura->descripcion; ?>",
				"id_office": "<?php $id_office=OfficeData::getById($documento->id_office); echo $id_office->descripcion; ?>",
				"serial_office": "<?php echo $documento->serial_office; ?>",
				"id_estado": "<?php echo $documento->id_estado; ?>",
				"id_polucion": "<?php $id_polucion=PolucionData::getById($documento->id_polucion); echo $id_polucion->descripcion; ?>",
				"id_user": "<?php $usuario=UserData::getById($documento->id_user); echo $usuario->name." ".$usuario->lastname; ?>",
				"observacion": "<?php echo $documento->observacion; ?>",
				"activo_fijo ": "<?php echo $documento->activo_fijo; ?>"
			} 
			<?php } ?>
		]
	}
<?php } ?>