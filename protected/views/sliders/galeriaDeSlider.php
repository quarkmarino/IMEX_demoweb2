
<h2>Imágenes en Slider</h2>
<?php
Yii::app ()->clientScript->registerScript ( 'scriptCloseGallery'.uniqid(), "
	$(document).ready(function(){
		$('#closeGallery').click(function(){
			$('#divAuxiliar').html('');
		});
	});
" );
$gallery = Gallery::model()->findByPk($sliderId);
if(!$gallery){
	$gallery = new Gallery;
	$gallery->id=$sliderId;
	$gallery->name = true;
	$gallery->description = true;
	$gallery->versions = array(
			'small' => array(
					'resize' => array(200, null),
			),
			'medium' => array(
					'resize' => array(800, null),
			)
	);
	$gallery->save();
} 
// render widget in view
$this->widget('GalleryManager', array(
		'gallery' => $gallery,
		'controllerRoute' => 'admin/gallery', //route to gallery controller
));
?>