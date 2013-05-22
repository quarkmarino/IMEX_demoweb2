<a href="<?php echo Yii::app()->request->urlReferrer ?>"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/botonregresar.jpg'); ?></a>
<h2>Modificar Archivo</h2>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>