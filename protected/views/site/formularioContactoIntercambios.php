<?php
	$galeria=array();
	$idunico=uniqid();
	$ancho=121;
	$cols=4;
	$randomId=uniqid();
	$portadaId=2;
?>

<div class="contenedorPrincipal" id="contenedorPrincipal">
	<div class="contenedorLeft">
		<div class='contenedorLeftTop'>
			<div class='contenedorLeftTopLogo'>
				<?php 
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/escudo.jpg');
				?>
			</div>
			<div class='contenedorLeftTopBotones' id="contenedorBotonesSeccion">
				<?php
				Yii::app ()->clientScript->registerScript ( 'callMenuSecciones' . $randomId, "
				$(document).ready(function(){
					$.ajax({
						'url':'index.php?r=site/GetMenuSeccionesBotones',
						'data':'portadaId=".$portadaId."',
						'type':'POST',
						'cache':false,
						'success':function(data){
							$('#contenedorBotonesSeccion').html(data);
						}
					});
					});
				" );				
				?>
			</div>
		</div>
		<div class='contenedorLeftMiddle'>
			<div class='contenedorLeftMiddleBotones' id="divBotonesCampus">
				<?php
				Yii::app ()->clientScript->registerScript ( 'callBotonesCampus' . $randomId, "
					$(document).ready(function(){
						$.ajax({
							'url':'index.php?r=site/GetBotonesCampus',
							'data':'portada_Id=".$portadaId."',
							'type':'POST',
							'cache':false,
							'success':function(data){
								$('#divBotonesCampus').html(data);
							}
						});
					});
				" );				
				?>
			</div>
			<div class='contenedorLeftMiddleImg' id="contenedorLeftMiddleImg">

			</div>
		</div>
		<div class='contenedorLeftBottom'>
		<?php
			echo CHtml::image( Yii::app()->request->baseUrl.'/images/bienvenidos.jpg');
			$imgSimex=CHtml::image( Yii::app()->request->baseUrl.'/images/logomodeloeducativosimex.jpg');
			echo CHtml::link($imgSimex,"http://modeloeducativosimex.com",array('target'=>'_blank'));
		?>
		</div>
	</div>
	<div class="contenedorInfo" id="contenedorInfo">

<div class="contenedorInfo">
	<?php 
		echo "<div style='overflow:hidden;float:left;width:".($ancho*$cols+($cols*4))."px;'>";
			echo "<div class='entradaTitulo' style='overflow:hidden;'>";
				echo "<div class='entradaTituloBotonRegresar' style='min-width:121px; min-height:121px;float:right;overflow:hidden;text-align:right;'>";
					$backurl='site/Index';
					$seccionId=null;
					/*
					$img=CHtml::image(Yii::app()->request->baseUrl.'/images/botonregresar.jpg');
					echo CHtml::link($img,
						$this->CreateUrl($backurl,array('seccionId'=>$seccionId)),
						array(
							'id'=>'botonRegresar'.uniqid()
						)
					);
					*/
					$this->renderPartial('BotonRegresar');
				echo "</div>";
				echo "<div class='entradaTituloImg' style='text-align:left;float:right;overflow:hidden;width:".($ancho*($cols-1))."px;'>";
					$imagen = Yii::app()->request->baseUrl.'/images/1.jpg';
					echo CHtml::image($imagen,'',array('style'=>'margin-left:121px;', 'id'=>'imagenTitulo'));
				echo "</div>";
			echo "</div>";
			echo "<div id='divScrollBox' style='background-color:#e5e5e5;overflow:hidden;float:left;padding:30px;margin-top:5px;margin-left:5px; min-height:310px; max-height:310px;width:".($ancho*($cols)-60+($cols*4))."px;overflow:auto;'>";

			$form=$this->beginWidget('CActiveForm', array(
					'id'=>'contacto-form',
					'enableAjaxValidation'=>true,
			));
			echo $form->errorSummary($model);
			
			echo "<div class='span-9'>";
			echo $form->labelEx($model,'asunto');
			echo $form->textField($model,'asunto',array('size'=>45,'maxlength'=>45));
			echo $form->error($model,'asunto');
			echo "</div>";

			echo "<div class='span-9'>";
			echo $form->labelEx($model,'para');
			echo $form->textField($model,'para',array('size'=>65,'maxlength'=>65));
			echo $form->error($model,'para');
			echo "</div>";			
			
			echo "<div class='span-6'>";
			echo $form->labelEx($model,'comentario');
			echo $form->textArea($model,'comentario',array('size'=>65,'maxlength'=>65));
			echo $form->error($model,'comentario');
			echo "</div>";

			
			echo "<div class='span-9'>";
			$this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'size'=>'small',
					'label'=>$model->isNewRecord ? 'Enviar' : 'Guardar',
			));
			
			$this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'reset',
					'type'=>'null',
					'size'=>'small',
					'label'=>'Limpiar',
					'htmlOptions'=>array('style'=>'margin-left:10px;')
			));
			echo "</div>";
			$this->endWidget();
			echo "</div>";
	?>
	<div class="contenedorInfoBottom" style='overflow:hidden;float:left;width:<?php echo $ancho*$cols+($cols*4) ?>px;min-width:<?php echo $ancho*$cols+($cols*4) ?>px;'>
		<div class="contenedorInfoBottomImg" id="contenedorInfoBottomImg" style="min-width:242px;">
		</div>
		<div class="contenedorInfoBottomBotones" style="float:right;margin-right:0px;">
			<?php 
				$this->actionGetMenuSeccionesEscolares();
			?>
		</div>
	</div>
</div>
<?php
if( $galeria ) {
	Yii::app ()->clientScript->registerScript('setGaleria'.$idunico,"
	$(document).ready(function(){
		$.ajax({
			'url':'index.php?r=site/GetSlider',
			'data':'galeriaId=".$galeria->id."',
			'type':'POST',
			'cache':false,
			'success':function(data){
				$('#contenedorLeftMiddleImg').html(data);
			}
		});
		});
	");
}
?>
	</div>
</div>