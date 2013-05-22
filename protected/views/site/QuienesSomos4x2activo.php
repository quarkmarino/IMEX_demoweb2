<?php
	$idunico=uniqid();
	echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/4x31activo.jpg','',array('usemap'=>'#Map4x31'));
?>
<map name="Map4x31" id="Map4x31">
  <area id="escudo<?php echo $idunico; ?>" title="Escudo" shape="rect" coords="385,126,507,244" href="#" />
  <area id="vision<?php echo $idunico; ?>" title="Visión" shape="rect" coords="1,0,121,118" href="#" />
  <area id="valores<?php echo $idunico; ?>" title="Valores" shape="rect" coords="257,0,377,117" href="#" />
  <area id="historia<?php echo $idunico; ?>" title="Historia" shape="rect" coords="128,126,247,246" href="#" />
  <area id="ubicacion<?php echo $idunico; ?>" title="Ubicación" shape="rect" coords="3,253,122,370" href="#" />
</map>
<?php
Yii::app ()->clientScript->registerScript ( 'eventoClicMision' . $idunico, "
	$(document).ready(function(){
		$('#escudo".$idunico."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetEntradasSeccion',
				'data':'clave=ESCUDO',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorInfo').html(data);
				}
			});	
		});
		$('#vision".$idunico."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetEntradasSeccion',
				'data':'clave=VISION',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorInfo').html(data);
				}
			});	
		});
		$('#valores".$idunico."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetEntradasSeccion',
				'data':'clave=VALORES',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorInfo').html(data);
				}
			});	
		});
		$('#historia".$idunico."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetEntradasSeccion',
				'data':'clave=HISTORIA',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorInfo').html(data);
				}
			});	
		});
		$('#ubicacion".$idunico."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetUbicacion',
				'data':'clave=UBICACION',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorPrincipal').html(data);
				}
			});	
		});
	});
" );
?>