<?php
	$idunico=uniqid();
	echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/3x11activo.jpg','',array('usemap'=>'#Map3x11'));
?>
<map name="Map3x1" id="Map3x11">
<area id="mision<?php echo $idunico; ?>" shape="rect" coords="127,2,248,118" href="#" />
</map>
<?php
Yii::app ()->clientScript->registerScript ( 'eventoClicMision' . $idunico, "
	$(document).ready(function(){
		$('#mision".$idunico."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetEntradasSeccion',
				'data':'clave=MISION',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorInfo').html(data);
				}
			});	
		});
	});
" );
?>