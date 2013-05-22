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
				$botonQuienesSomos=CHtml::image( Yii::app()->request->baseUrl.'/images/botonquienessomos.jpg');
				echo CHtml::link($botonQuienesSomos,
						$this->CreateUrl('site/MenuQuienesSomos'),
						array(
							'id'=>'botonQuienesSomos'.$randomId,
							'ajax'=>array(
								'type'=>'POST',
								'url'=>$this->CreateUrl('site/MenuQuienesSomos'),
								'success'=>"function(data){
									$('#contenedorPrincipal').html(data);
								}"
							)
						)
					);	
				?>
				</div>
				<?php
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/botonadmisionesactivo.jpg');
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
				echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/2x22activo.jpg','',array('usemap'=>'#Map2x22'));
				echo CHtml::tag('map',array('name'=>'Map2x22', 'id'=>'Map2x22'),false,false);
					echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'129,127,252,244', 'id'=>'fichaDeInscripcion'.$randomId, 'href'=>'#'));				
					Yii::app ()->clientScript->registerScript ( 'eventoClicAjaxCalls0' . $randomId, "
						$(document).ready(function(){
							$('#fichaDeInscripcion".$randomId."').click(function(){
								$.ajax({
								'url':'index.php?r=site/GetEntradasSeccion',
									'data':'clave=FICHADEINSCRIPCION&backmenu=2',
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
				echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/3x12activo.jpg');
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
			echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/4x32activo.jpg','',array('usemap'=>'#Map4x32'));
			echo CHtml::tag('map',array('name'=>'Map4x32', 'id'=>'Map4x32'),false,false);
				echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'2,126,120,245', 'id'=>'informacionGeneral'.$randomId, 'href'=>'#'));
			Yii::app ()->clientScript->registerScript ( 'eventoClicAjaxCalls2' . $randomId, "
				$(document).ready(function(){
					$('#informacionGeneral".$randomId."').click(function(){
						$.ajax({
							'url':'index.php?r=site/GetEntradasSeccion',
							'data':'clave=INFORMACIONGENERAL&controls=1&backmenu=2',
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
		<div class="contenedorInfoBottom">
			<div class="contenedorInfoBottomImg" id="contenedorInfoBottomImg">
			<?php
			echo CHtml::image(Yii::app()->request->baseUrl.'/images/fondos/2x12activo.jpg','',array('usemap'=>'#Map2x12'));
			echo CHtml::tag('map',array('name'=>'Map2x12', 'id'=>'Map2x12'),false,false);
				echo CHtml::tag('area',array('shape'=>'rect', 'coords'=>'0,0,119,117', 'id'=>'fechasDeExamenes'.$randomId, 'href'=>'#'));
			Yii::app ()->clientScript->registerScript ( 'eventoClicAjaxCalls3' . $randomId, "
				$(document).ready(function(){
					$('#fechasDeExamenes".$randomId."').click(function(){
						$.ajax({
							'url':'index.php?r=site/GetEntradasSeccion',
							'data':'clave=FECHASDEEXAMENES&controls=0&backmenu=2',
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