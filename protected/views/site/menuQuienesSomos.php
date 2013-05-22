<?php $this->pageTitle = Yii::app()->name; 
$effect='sliceUpDownLeft';
$randomId=uniqid();
$animSpeed='2000';
?>
<div class="contenedorPrincipal" id="contenedorPrincipal">
	<div class="contenedorLeft">
		<div class='contenedorLeftTop'>
			<div class='contenedorLeftTopLogo'>
				<?php 
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/escudo.jpg');
				?>
			</div>
			<div class='contenedorLeftTopBotones'>
				<div id="botonQuienesSomos">
				<?php
				echo CHtml::image( Yii::app()->request->baseUrl.'/images/botonquienessomosactivo.jpg');
				?>
				</div>
				<div id="botonAdmisiones">
				<?php 
				$botonAdmisiones = CHtml::image( Yii::app()->request->baseUrl.'/images/botonadmisiones.jpg');
				echo CHtml::link($botonAdmisiones,
						$this->CreateUrl('site/MenuAdmisiones'),
						array(
								'id'=>'botonAdmisiones'.$randomId,
						)
				);
				?>
				</div>
				<?php
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/botonexalumnos.jpg');
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/botoncomunidadimex.jpg');
				?>
			</div>
		</div>
		<div class='contenedorLeftMiddle'>
			<div class='contenedorLeftMiddleBotones'>
				<?php
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/botoncampusestrelladelsur.jpg');
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/botoncampussanpedro.jpg');
				?>
			</div>
			<div class='contenedorLeftMiddleImg' id="contenedorLeftMiddleImg">
				<?php
					echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/2x21activo.jpg','',array('usemap'=>'#Map2x21'));
					echo CHtml::tag('map',array('name'=>'Map2x21', 'id'=>'Map2x21'),false,false);
						echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'128,2,247,117', 'id'=>'filosofia'.$randomId, 'href'=>'#'));
				Yii::app ()->clientScript->registerScript ( 'eventoClicAjaxCalls0' . $randomId, "
					$(document).ready(function(){
						$('#filosofia".$randomId."').click(function(){
							$.ajax({
								'url':'index.php?r=site/GetEntradasSeccion',
								'data':'clave=FILOSOFIA',
								'type':'POST',
								'cache':false,
								'success':function(data){
									$('#contenedorInfo').html(data);
								}
							});
						});
					});
				");
				
				?>
				
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
		<div class="contenedorInfoTop">
			<div class="contenedorInfoTopImg" id="contenedorInfoTopImg">
			<?php
				echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/3x11activo.jpg','',array('usemap'=>'#Map3x11'));
				
				echo CHtml::tag('map',array('name'=>'Map3x11', 'id'=>'Map3x11'),false,false);
					echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'127,2,248,118', 'id'=>'mision'.$randomId, 'href'=>'#'));
				Yii::app ()->clientScript->registerScript ( 'eventoClicAjaxCalls1' . $randomId, "
					$(document).ready(function(){
						$('#mision".$randomId."').click(function(){
							$.ajax({
								'url':'index.php?r=site/GetEntradasSeccion',
								'data':'clave=MISION',
								'type':'POST',
								'cache':false,
								'success':function(data){
									$('#contenedorInfo').html(data);
								}			
							});	
							});
					});
				");
			?>
			</div>
			<div class="contenedorInfoTopBotones" id="contenedorInfoTopBotones">
			<?php
			/*
				$img=CHtml::image(Yii::app()->request->baseUrl.'/images/botonregresar.jpg');
				echo CHtml::link($img,
					$this->CreateUrl('site/Index'),
					array(
						'id'=>'botonRegresar'.uniqid()
					)
				);
				*/
			$this->renderPartial('BotonRegresar');
			?>
			</div>
		</div>
		<div class="contenedorInfoMiddle" id="contenedorInfoMiddle">
<?php
	echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/4x31activo.jpg','',array('usemap'=>'#Map4x31'));
	echo CHtml::tag('map',array('name'=>'Map4x31', 'id'=>'Map4x31'),false,false);
		echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'385,126,507,244', 'id'=>'escudo'.$randomId, 'href'=>'#'));
		echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'1,0,121,118', 'id'=>'vision'.$randomId, 'href'=>'#'));
		echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'257,0,377,117', 'id'=>'valores'.$randomId, 'href'=>'#'));
		echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'128,126,247,246', 'id'=>'historia'.$randomId, 'href'=>'#'));
		echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'3,253,122,370', 'id'=>'ubicacion'.$randomId, 'href'=>$this->CreateUrl('site/GetUbicacion',array('clave'=>'UBICACION'))));

Yii::app ()->clientScript->registerScript ( 'eventoClicAjaxCalls2' . $randomId, "
	$(document).ready(function(){
		$('#escudo".$randomId."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetEntradasSeccion',
				'data':'clave=ESCUDO',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorInfo').html(data);
				}
			});
		});
		$('#vision".$randomId."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetEntradasSeccion',
				'data':'clave=VISION',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorInfo').html(data);
				}
			});	
		});
		$('#valores".$randomId."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetEntradasSeccion',
				'data':'clave=VALORES',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorInfo').html(data);
				}
			});	
		});
		$('#historia".$randomId."').click(function(){
			$.ajax({
				'url':'index.php?r=site/GetEntradasSeccion',
				'data':'clave=HISTORIA',
				'type':'POST',
				'cache':false,
				'success':function(data){
					$('#contenedorInfo').html(data);
				}
			});	
		});
	});
" );
?>
		</div>
		<div class="contenedorInfoBottom">
			<div class="contenedorInfoBottomImg" id="contenedorInfoBottomImg">
			<?php
			echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/2x11activo.jpg');
			?>
			</div>
			<div class="contenedorInfoBottomBotones">
				<div class="contenedorBotonesSecciones">
				<?php
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/botonpreescolar.jpg');
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/botonprimaria.jpg','',array('width'=>'117'));
				?>
				</div>
				<div class="contenedorBotonesSecciones">
				<?php
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/botonsecundaria.jpg');
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/botonbachillerato.jpg','',array('width'=>'117'));
				?>
				</div>
			</div>
		</div>
	</div>
</div>