<?php
$randomId=uniqid();
$botonQuienesSomos=CHtml::image( Yii::app()->request->baseUrl.'/images/botonquienessomos.jpg');
echo CHtml::link($botonQuienesSomos,'#',array('id'=>'botonQuienesSomos'.$randomId));
Yii::app ()->clientScript->registerScript ('doHome',"
	$(document).ready(function(){
		$('#botonQuienesSomos".$randomId."').click(function(){
			$.ajax({
				'url':'index.php?r=site/BotonQuienesSomos',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#botonQuienesSomos').html(data);
				}		
			});
		});
		$.ajax({
			'url':'index.php?r=site/QuienesSomos2x2',
			'data':'',
			'type':'POST',
			'cache':false,
			'success':function(data){
				$('#contenedorLeftMiddleImg').html(data);
			}
		});
		
		$.ajax({
			'url':'index.php?r=site/ReestructuraDivInfo',
			'data':'',
			'type':'POST',
			'cache':false,
			'success':function(data){
				$('#contenedorInfo').html(data);
			}
		});
		
		$.ajax({
			'url':'index.php?r=site/QuienesSomos3x1',
			'data':'',
			'type':'POST',
			'cache':false,
			'success':function(data){
				$('#contenedorInfoTopImg').html(data);
			}
		});
		$.ajax({
			'url':'index.php?r=site/QuienesSomos4x2',
			'data':'',
			'type':'POST',
			'cache':false,
			'success':function(data){
				$('#contenedorInfoMiddle').html(data);
			}
		});
		$.ajax({
			'url':'index.php?r=site/QuienesSomos2x1',
			'data':'',
			'type':'POST',
			'cache':false,
			'success':function(data){
				$('#contenedorInfoBottomImg').html(data);
			}
		});		
})");

?>