				<div style="float:right;position:relative;margin-top:10px;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'BOTONREGRESAR'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteBOTONREGRESAR'.$modeloBoton->id));
							echo CHtml::link($imagenBOTON,Yii::app()->request->urlReferrer,array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && ((Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)) ){
							echo '<div id="BOTONREGRESARBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstanteBOTONREGRESAR'.$modeloBoton->id.'").attr("src", data);
											}
										});
									}',
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
						}
					?>
				</div>