<div class="contenedorLeftMiddleImg" style="padding:0px;">
<?php
$galeria=Gallery::model()->findByPk($galeriaId);

if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
	$entradaSlider=EntradasSliders::model()->findByAttributes(array('clave'=>$clave, 'slider_id'=>$galeria->id));
	?>
	<div style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
		<?php 
		echo CHtml::link('Editar',$this->CreateUrl('slide   rs/GetGaleria',array('id'=>$galeriaId)), array('title'=>'Editar Imágenes de Slider', 'target'=>'_blank') )
		?>
	</div>
	<div id="changeSlider" style="font-size:10px;position:relative;left:3px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
		<?php
			$this->widget('ext.editable.EditableField', array(
				'type' => 'select',
				'placement' => 'left',
				'model' => $entradaSlider,
				'attribute' => 'slider_id',
				'url' => $this->createUrl('site/ActualizarSliderEntrada'),
				'onUpdate' => 'js: function(e, editable) {
					$.ajax({
						url:"index.php?r=site/GetSliderPorClave",
						data:"clave='.$clave.'&portadaId='.$portadaId.'&galeriaId="+editable.value,
						type:"POST",
						success: function(data){
							$("#contenedorLeftMiddleImg").html(data);
						}
					});
				}',
				'source' => CHtml::listData(Sliders::model()->findAll(),'id','nombre')
			));
		?>
	</div>	
	<?php
}
$imagenes=GalleryPhoto::model()->getImagenesDeGaleria($galeria->id);
$images=array();
foreach ($imagenes as $imagen) {
	$images[]=array('src'=>$imagen->getUrl(),'caption'=>'');
}
$this->widget('application.extensions.nivoslider.ENivoSlider', 
	array(
		'htmlOptions'=>array('id'=>'sliderx','width'=>'253','height'=>'242'),
		'id'=>'sliderx',
		'config'=>array(
				'effect'=>'fade',
				'slices'=>'2',
				'pauseTime'=>'8000',
				'controlNav'=>false,
				'keyboardNav'=>false,
				'pauseOnHover'=>false,
				'directionNav'=>false,
				'animSpeed'=>'2000',
		),
		'images'=>$images,
	)
);
?>
</div>