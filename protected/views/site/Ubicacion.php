 <?php 
$randomId=uniqid();
$portadaId=1;
//Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
//Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/gmap3.js', CClientScript::POS_HEAD);
?>
<div class="contenedorPrincipal" id="contenedorPrincipal1" style="margin:0;padding:0;float:left;width:100%;min-height:0;">
	<div class="contenedorLeft" style="margin:0;padding:0;min-height:0;">
		<div class='contenedorLeftTop'>
			<div class='contenedorLeftTopLogo'>
				<?php
					echo CHtml::image(Yii::app()->request->baseUrl.'/images/escudo.jpg');
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
	</div>
	<div class="contenedorInfo" id="contenedorInfo" style="float:left;min-height:0;">
		<div class="contenedorInfo" id="contenedorInfoTop" style="float:left;min-height:0;height:121px;min-height:0;">
			<div style="float:left;width:363px;margin:0;padding:0;text-align:center;position:relative;">
			<?php
                            $imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'UBICACION'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
                                                        $imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								echo CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteUBICACION'.$modeloBoton->id));
						}
                                if(!Yii::app()->user->isGuest && ( (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5) ) ){
							echo '<div id="UBICACIONBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstanteUBICACION'.$modeloBoton->id.'").attr("src", data);
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
			<div style="float:left;width:121px;margin:0;padding:0;text-align:right;">
			<?php
			$this->renderPartial('BotonRegresar');
			?>
			</div>
		</div>
		<div class="contenedorInfo" id="contenedorInfoBottom" style="float:left;min-height:0;height:121px;min-height:0; font-size:12px; padding-top:10px;padding-right:10px;">
		<?php 
			$informacion=InformacionConstante::model()->findByPk(1);
			if(!Yii::app()->user->isGuest  ){
				$this->widget('ext.editable.EditableField', array(
					'type' => 'textarea',
					'placement' => 'left',
					'model' => $informacion,
					'attribute' => 'datos_de_ubicacion',
					'url' => $this->createUrl('site/ActualizarDatosDeUbicacion'),
					
					)
				);				
			}
			else{
				echo $informacion->datos_de_ubicacion;
			}
		?>
		</div>
	</div>
</div>
<div class="contenedorPrincipal" id="contenedorPrincipal2" style="margin:0;padding:0;float:left;width:100%;min-height:0;">
		
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
	<div style="float:left;margin-top:11px;margin-left:5px;width:370px;vertical-align:bottom;" id="mapEstrella">
	<div style="float:left;width:100%;font-size:11px;font-weight: bold;padding:0;margin:0;">Campus Estrella del Sur</div>
	<?php
		Yii::import('ext.jquery-gmap.*');
		$gmap = new EGmap3Widget();
		$gmap->width=370;
		$gmap->height=225;
		$options = array(
    		'scaleControl' => true,
    		'streetViewControl' => false,
    		'zoom' => 17,
    		'center' => array(19.043012,-98.246419),
    		'mapTypeId' => EGmap3MapTypeId::HYBRID,
    		'mapTypeControlOptions' => array(
        		'style' => EGmap3MapTypeControlStyle::DROPDOWN_MENU,
        		'position' => EGmap3ControlPosition::RIGHT_TOP,
    		),
    		'zoomControlOptions' => array(
        		'style' => EGmap3ZoomControlStyle::SMALL,
        		'position' => EGmap3ControlPosition::LEFT_TOP
    		),
		);
		$gmap->setOptions($options);
		$gmap->renderMap();
	?>
	</div>
		<div style="float:left;margin-top:11px;margin-left:10px;width:370px;vertical-align:bottom;" id="mapSanPedro">
		<div style="float:left;width:100%;font-size:11px;font-weight: bold;padding:0;margin:0;">Campus San Pedro</div>
	<?php
		Yii::import('ext.jquery-gmap.*');
		$gmap = new EGmap3Widget();
		$gmap->width=370;
		$gmap->height=225;
		$options = array(
    		'scaleControl' => true,
    		'streetViewControl' => false,
    		'zoom' => 17,
    		'center' => array(19.049868,-98.27307),
    		'mapTypeId' => EGmap3MapTypeId::HYBRID,
    		'mapTypeControlOptions' => array(
        		'style' => EGmap3MapTypeControlStyle::DROPDOWN_MENU,
        		'position' => EGmap3ControlPosition::RIGHT_TOP,
    		),
    		'zoomControlOptions' => array(
        		'style' => EGmap3ZoomControlStyle::SMALL,
        		'position' => EGmap3ControlPosition::LEFT_TOP
    		),
		);
		$gmap->setOptions($options);
		$gmap->renderMap();
	?>
	</div>

<div class="contenedorPrincipal" id="contenedorPrincipal3" style="margin:0;padding:0;float:left;width:100%;min-height:0;">
	<div class='contenedorLeftBottom' style="float:left;">
		<?php
			echo CHtml::image( Yii::app()->request->baseUrl.'/images/bienvenidos.jpg');
			$imgSimex=CHtml::image( Yii::app()->request->baseUrl.'/images/logomodeloeducativosimex.jpg');
			echo CHtml::link($imgSimex,"http://modeloeducativosimex.com",array('target'=>'_blank'));
		?>
	</div>
	<div class="contenedorInfoBottomImg" id="contenedorInfoBottomImg" style="float:left;min-width:242px;width:242px;">&nbsp;</div>
	<div class="contenedorInfoBottomBotones" style="float:left;">
		<?php 
			$this->actionGetMenuSeccionesEscolares();
		?>
	</div>		
</div>