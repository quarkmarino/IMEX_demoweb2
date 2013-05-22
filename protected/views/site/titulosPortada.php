<?php
$portada=Portadas::model()->findByPk($portadaId);
if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
	?>
	<div id="editTituloPortada" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
	<?php
		$this->widget('ext.editable.EditableField', array(
			'type' => 'select',
			'placement' => 'left',
			'model' => $portada,
			'attribute' => 'gallery_photo_id',
			'url' => $this->createUrl('site/ActualizarTituloPortada'),
			'onUpdate' => 'js: function(e, editable) {
				$.ajax({
					url:"index.php?r=site/GetTitulosPortada",
					data:"portadaId='.$portada->id.'",
					type:"POST",
					success: function(data){
						$("#contenedorTitulosPortada").html(data);
					}
				});
			}',
			'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1)),'id','name')
		));
	?>
	</div>
	<?php
}

echo "<div id='divTituloPortada'>";
if($portada->galleryPhoto)echo CHtml::image( $portada->galleryPhoto->getUrl());
echo "</div>";
$imgSimex=CHtml::image( Yii::app()->request->baseUrl.'/images/logomodeloeducativosimex.jpg');
echo CHtml::link($imgSimex,"http://modeloeducativosimex.com",array('target'=>'_blank'));