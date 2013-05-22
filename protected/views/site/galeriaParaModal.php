<?php
$idunico=uniqid();
if (isset ( $galeriaId )) {
	$galeria = Gallery::model ()->findByPk ( $galeriaId );
	if ( $galeria ) {
		$photos = GalleryPhoto::model ()->findAllByAttributes ( array (
			'gallery_id' => $galeria->id
		) );
		foreach ( $photos as $photo ) {
			echo "<div class='span-5' style='min-width:120px;min-height:120px;max-width:120px;overflow:hidden;border:1px solid #ccc; margin-bottom:5px;'>";
			$image = CHtml::image ( $photo->getUrl (),'',array() );
			echo CHtml::link ( $image, '#', array (
				'title' => 'Haga click para establecer esta imágen',
				'id'=>'imagen'.$photo->id.$idunico,
			) );
			if($tipoRetorno==1){
				Yii::app()->clientScript->registerScript("imagenclick".$photo->id.$idunico, "
					$('#imagen" . $photo->id . $idunico . "').click( function() {
						$.ajax({
							'url':'index.php?r=site/SetImagen',
							'data':'identificador=".$identificador."&entradaId=".$entradaId."&imagenId=".$photo->id."',
							'type':'POST',
							'cache':false,
							'success':function(data){
								if(data=='ok')$('#".$divDestino."').css('background-image','url(\"".$photo->getUrl()."\")');
							},
						});
					});
				" );
			}
			echo "</div>";
		}
	}
}
?>