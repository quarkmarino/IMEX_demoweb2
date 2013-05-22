<?php
	$portadaId = 2;
	$portada = Portadas::model()->findByPk($portadaId);
	if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
		?>
		<div id="editBotonCampus<?php echo $portadaId; ?>" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
		<?php
			$this->widget('ext.editable.EditableField', array(
				'type' => 'select',
				'placement' => 'left',
				'model' => $portada,
				'attribute' => 'boton_id',
				'url' => $this->createUrl('site/ActualizarBotonPortada'),
				'onUpdate' => 'js: function(e, editable) {
					$.ajax({
						url:"index.php?r=site/GetBotonesCampus",
						data:"portada_Id='.$portadaId.'",
						type:"POST",
						success: function(data){
							$("#divBotonesCampus").html(data);
						}
					});
				}',
				'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1)),'id','name')
			));
		?>
		</div>
		<div id="editBotonActivoCampus<?php echo $portadaId; ?>" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
		<?php
			$this->widget('ext.editable.EditableField', array(
				'type' => 'select',
				'placement' => 'left',
				'model' => $portada,
				'attribute' => 'boton_activo_id',
				'url' => $this->createUrl('site/ActualizarBotonActivoPortada'),
				'onUpdate' => 'js: function(e, editable) {
					$.ajax({
						url:"index.php?r=site/GetBotonesCampus",
						data:"portada_Id='.$portadaId.'",
						type:"POST",
						success: function(data){
							$("#divBotonesCampus").html(data);
						}
					});
				}',
				'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1)),'id','name')
			));
		?>
		</div>
		<?php
	}
	$boton=null;
	if($portada){
		if($portada->boton){
			$boton=$portada->boton;
			if($portada_Id==$portadaId)$boton=$portada->botonActivo;
			if($boton){
				$botonCampus=CHtml::image($boton->getUrl());
				echo CHtml::link($botonCampus,$this->CreateUrl('site/Index',array('portadaId'=>$portadaId)) );
			}
		}
	}
	$portadaId = 3;
	$portada = Portadas::model()->findByPk($portadaId);
	if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
		?>
			<div id="editBotonCampus<?php echo $portadaId; ?>" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
			<?php
				$this->widget('ext.editable.EditableField', array(
					'type' => 'select',
					'placement' => 'left',
					'model' => $portada,
					'attribute' => 'boton_id',
					'url' => $this->createUrl('site/ActualizarBotonPortada'),
					'onUpdate' => 'js: function(e, editable) {
						$.ajax({
							url:"index.php?r=site/GetBotonesCampus",
							data:"portada_Id='.$portadaId.'",
							type:"POST",
							success: function(data){
								$("#divBotonesCampus").html(data);
							}
						});
					}',
					'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1)),'id','name')
				));
			?>
			</div>
			<div id="editBotonActivoCampus<?php echo $portadaId; ?>" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
			<?php
				$this->widget('ext.editable.EditableField', array(
					'type' => 'select',
					'placement' => 'left',
					'model' => $portada,
					'attribute' => 'boton_activo_id',
					'url' => $this->createUrl('site/ActualizarBotonActivoPortada'),
					'onUpdate' => 'js: function(e, editable) {
						$.ajax({
							url:"index.php?r=site/GetBotonesCampus",
							data:"portada_Id='.$portadaId.'",
							type:"POST",
							success: function(data){
								$("#divBotonesCampus").html(data);
							}
						});
					}',
					'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1)),'id','name')
				));
			?>
			</div>
			<?php
		}
		$boton=null;
		if($portada){
			if($portada->boton){
				$boton=$portada->boton;
				if($portada_Id==$portadaId)$boton=$portada->botonActivo;
				if($boton){
					$botonCampus=CHtml::image($boton->getUrl(),'');
					echo CHtml::link($botonCampus,$this->CreateUrl('site/Index',array('portadaId'=>$portadaId)) );
				}
			}
		}
	

?>