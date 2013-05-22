<?php
$effect='sliceUpDownLeft';
$randomId=uniqid();
$animSpeed='2000';

$galeriaId=$sliderId;
$galeria=Gallery::model()->findByPk($galeriaId);
$imagenes=GalleryPhoto::model()->getImagenesDeGaleria($galeria->id);
$images=array();
foreach ($imagenes as $imagen) {
	$images[]=array('src'=>$imagen->getUrl(),'caption'=>'');
}
$numImages=count($images);
if($numImages==1) {
	echo CHtml::image($imagenes[0]->GetUrl(),'',array('title'=>$galeriaId, 'usemap'=>'#menuArea'.$galeriaId));
	$areasSensibles=MenusAreasSensibles::model()->findAllByAttributes(array('index_slider_id'=>$galeriaId));
	if ( $areasSensibles ) {
		echo CHtml::tag('map',array('name'=>'menuArea'.$galeriaId, 'id'=>'menuArea'.$galeriaId),false,false);
		foreach ($areasSensibles as $areaSensible) {
			echo CHtml::tag('area',
					array(
							'shape'=>'rect',
							'coords'=> $areaSensible->x1.','.$areaSensible->y1.','.$areaSensible->x2.','.$areaSensible->y2,
							'id'=>'areaSensible'.$areaSensible->id.$randomId,
							'href'=>$this->CreateUrl('site/GetEntradasSeccion',array('areaSensibleId'=>$areaSensible->id))
					)
			);
		}
		echo CHtml::closeTag('map');
	}


}
else {
	$this->widget('application.extensions.nivoslider.ENivoSlider',
			array(
					'htmlOptions'=>array('id'=>'sliderx','width'=>'253','height'=>'242'),
					'id'=>'sliderx',
					'config'=>array(
							'effect'=>$effect,
							'slices'=>'2',
							'pauseTime'=>'8000',
							'controlNav'=>false,
							'keyboardNav'=>false,
							'pauseOnHover'=>false,
							'directionNav'=>false,
							'animSpeed'=>$animSpeed,
					),
					'images'=>$images,
			)
	);
}
?>