<?php
$effect='sliceUpDownLeft';
$randomId=uniqid();
$animSpeed='2000';
$this->widget('application.extensions.nivoslider.ENivoSlider', array(
	'htmlOptions'=>array('id'=>'slider1'.$randomId),
	'id'=>'slider1'.$randomId,
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
	'images'=>array( //@array images with images arrays.
		array('src'=>Yii::app()->request->baseUrl.'/images/fondos/2x21.jpg','caption'=>''), //only display image.
		array('src'=>Yii::app()->request->baseUrl.'/images/fondos/2x22.jpg','caption'=>''), //display image and nivo slider caption.
		array('src'=>Yii::app()->request->baseUrl.'/images/fondos/2x23.jpg','caption'=>''), //display image with link.
		array('src'=>Yii::app()->request->baseUrl.'/images/fondos/2x24.jpg','caption'=>''), //display image with nivo slider caption and link reference.
	),
	)
);