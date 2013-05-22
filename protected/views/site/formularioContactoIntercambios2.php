<?php
	$galeria=array();
	$idunico=uniqid();
	$ancho=121;
	$cols=4;
	$randomId=uniqid();
	$portadaId=2;
        if(isset($seccionId)){
		$secId=$seccionId;
                $seccion = Secciones::model()->findByPk( $seccionId );
                $portadaId = $seccion->portada->id;
		$entradaSlider=EntradasSliders::model()->findByAttributes(array('seccion_id'=>$secId));
		if($entradaSlider){
			$galeria=Gallery::model()->findByPk($entradaSlider->slider_id);
			$entrada=Entradas::model()->findByPk($entradaSlider->entrada_id);
		}
		
	}
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
					/*$imagen = Yii::app()->request->baseUrl.'/images/1.jpg';
					echo CHtml::image($imagen,'',array('style'=>'margin-left:121px;', 'id'=>'imagenTitulo'));*/
                                
                                        //var_dump($entrada->gallery_photo_id);
                                        if($entrada->gallery_photo_id){
                                            if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
						echo '<div id="editImagenTitle" style="font-size:10px;position:relative;left:193px;top:1px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;overflow:hidden;">';
						$this->widget('ext.editable.EditableField', array(
								'type' => 'select',
								'placement' => 'left',
								'model' => $entrada,
								'attribute' => 'gallery_photo_id',
								'url' => $this->createUrl('Entradas/ActualizarImagenPrincipal'),
								'onUpdate' => 'js: function(e, editable) {
                                                                        $.ajax({
                                                                                url:"index.php?r=site/GetUrlImagen",
                                                                                data:"id="+editable.value,
                                                                                type:"GET",
                                                                                success: function(data){
                                                                                    $("#imagenTitulo").attr("src", data);
                                                                                }
                                                                        });
                                                                }',
								'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
								'options' => array(
										'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
								),
						));
						echo '</div>';
						$this->widget('ext.eguiders.EGuider', array(
								'id'            => 'intro',
								'next'          => 'primera',
								'title'         => 'Tips',
								'buttons'       => array(
										array(
												'name'=>'Siguiente',
												'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('primera');}"
										)
								),
								'description'   => 'Esta es la ventana de un artículo, también puede editar el contenido.',
								'overlay'       => true,
								'xButton'       => true,
								'show'          => false,
								'onShow' => 'js:function(){ $(".highlight pre").show();}'
						)
						);
						$this->widget('ext.eguiders.EGuider', array(
								'id'=>'primera',
								'next'=>'segunda',
								'title'=>'Área 2',
								'buttons'=>array(
										array(
												'name'=>'Anterior',
												'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('intro');}"
										),
										array(
												'name'=>'Siguiente',
												'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('segunda');}"
										)
								),
								'description'   => 'Puede cambiar la imágen que representa al presente artículo dando click aqui y seleccionando otra de la lista',
								'overlay'       => true,
								'xButton'       => true,
								'show'          => false,
								'attachTo' => '#editImagenTitle',
								'position' => 9,
								'onShow' => 'js:function(){ $(".highlight pre").show();}'
						)
						);
					}
					$imagen = GalleryPhoto::model()->findByPk($entrada->gallery_photo_id);
					echo CHtml::image($imagen->getUrl(),'',array('style'=>'margin-left:121px;', 'id'=>'imagenTitulo'));
				}
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