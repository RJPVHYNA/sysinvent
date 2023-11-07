<div class="row">
	<div class="col-lg-12">
		<div class="card card-row">
			<div class="card-header">
				<table>
					<tr>
						<td style="width:170px;">
							<img style="width: 150px;border-radius: 0;vertical-align: middle;" src="dist/img/logo.png" alt="Logo">
						</td>
						<td>
							<h2 class="text-dark display-6">Bienvenido</h2>
							<p style="color:#000;margin-bottom: 0;">
								<?php
									$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
									$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
									echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
								?>
							</p>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>