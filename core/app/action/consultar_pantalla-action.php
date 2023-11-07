<?php if(isset($_POST["id"])){ ?>
	{
		"data": [
			<?php $documento =  PantallaData::getById($_POST["id"]); if($documento){?>
			{
				"id": "<?php echo $documento->id; ?>",
				"id_marca": "<?php $id_marca=MarcaData::getById($documento->id_marca); echo $id_marca->descripcion; ?>",
				"modelo": "<?php echo $documento->modelo; ?>",
				"serial": "<?php echo $documento->serial; ?>",
				"id_estado": "<?php echo $documento->id_estado; ?>",
				"dimension": "<?php echo $documento->dimension; ?>"
			} 
			<?php } ?>
		]
	}
<?php } ?>