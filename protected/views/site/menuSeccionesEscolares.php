<?php 
	$randomId=uniqid();
?>
<table border="0" cellspaccing="0" cellpadding="0" width="245">
	<tr>
		<td style="width:115px;padding:0;">
				<div style="float:right;position:relative;margin:0;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'PREESCOLAR'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
                                                        if($clave=='PREESCOLAR')$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_activo_id);
                                                        else $imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
                                                        
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstantePREESCOLAR'.$modeloBoton->id, 'width'=>'121'));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('site/GetEntradasPorCategoria',array('clave'=>'PREESCOLAR')),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && ( (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5) ) ){
							echo '<div id="PREESCOLARBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:right;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $modeloBoton,
									'attribute' => 'gallery_photo_id',
									'url' => $this->createUrl('site/ActualizarBotonConstante'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetUrlImagen",
											data:"id="+editable.value,
											type:"GET",
											success: function(data){
												$("#botonConstantePREESCOLAR'.$modeloBoton->id.'").attr("src", data);
											}
										});
									}',
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
                                                        echo '<div id="PREESCOLARBUTTONACTIVO'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:20px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $modeloBoton,
									'attribute' => 'gallery_photo_activo_id',
									'url' => $this->createUrl('site/ActualizarBotonConstanteActivo'),
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
                                                        
                                                        
						}
					?>
				</div>		
		</td>
		<td style="width:115px;padding:0;">
				<div style="float:right;position:relative;margin:0;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'PRIMARIA'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							if($clave=='PRIMARIA')$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_activo_id);
                                                        else $imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstantePRIMARIA'.$modeloBoton->id,'width'=>'118'));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('site/GetEntradasPorCategoria',array('clave'=>'PRIMARIA')),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && ( (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5) ) ){
							echo '<div id="PRIMARIABUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $modeloBoton,
									'attribute' => 'gallery_photo_id',
									'url' => $this->createUrl('site/ActualizarBotonConstante'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetUrlImagen",
											data:"id="+editable.value,
											type:"GET",
											success: function(data){
												$("#botonConstantePRIMARIA'.$modeloBoton->id.'").attr("src", data);
											}
										});
									}',
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
                                                        echo '<div id="PRIMARIABUTTONACTIVO'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:20px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $modeloBoton,
									'attribute' => 'gallery_photo_activo_id',
									'url' => $this->createUrl('site/ActualizarBotonConstanteActivo'),
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
						}
					?>
				</div>
		</td>
	</tr>
	<tr>
		<td style="width:115px;padding:0;">
				<div style="float:right;position:relative;margin:0;margin-top:8px;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'SECUNDARIA'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							if($clave=='SECUNDARIA')$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_activo_id);
                                                        else $imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteSECUNDARIA'.$modeloBoton->id,'width'=>'121'));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('site/GetEntradasPorCategoria',array('clave'=>'SECUNDARIA')),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && ( (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5) ) ){
							echo '<div id="SECUNDARIABUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $modeloBoton,
									'attribute' => 'gallery_photo_id',
									'url' => $this->createUrl('site/ActualizarBotonConstante'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetUrlImagen",
											data:"id="+editable.value,
											type:"GET",
											success: function(data){
												$("#botonConstanteSECUNDARIA'.$modeloBoton->id.'").attr("src", data);
											}
										});
									}',
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
                                                        echo '<div id="SECUNDARIABUTTONACTIVO'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:20px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $modeloBoton,
									'attribute' => 'gallery_photo_activo_id',
									'url' => $this->createUrl('site/ActualizarBotonConstanteActivo'),
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
						}
					?>
				</div>
		</td>
		<td style="width:115px;padding:0;">
				<div style="float:right;position:relative;margin:0;margin-top:8px;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'BACHILLERATO'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							if($clave=='BACHILLERATO')$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_activo_id);
                                                        else $imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteBACHILLERATO'.$modeloBoton->id,'width'=>'118'));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('site/GetEntradasPorCategoria',array('clave'=>'BACHILLERATO')),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && ( (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5) ) ){
							echo '<div id="BACHILLERATOBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $modeloBoton,
									'attribute' => 'gallery_photo_id',
									'url' => $this->createUrl('site/ActualizarBotonConstante'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetUrlImagen",
											data:"id="+editable.value,
											type:"GET",
											success: function(data){
												$("#botonConstanteBACHILLERATO'.$modeloBoton->id.'").attr("src", data);
											}
										});
									}',
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
                                                        echo '<div id="BACHILLERATOBUTTONACTIVO'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:20px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $modeloBoton,
									'attribute' => 'gallery_photo_activo_id',
									'url' => $this->createUrl('site/ActualizarBotonConstanteActivo'),
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
						}
					?>
				</div>
		</td>
	</tr>
</table>
