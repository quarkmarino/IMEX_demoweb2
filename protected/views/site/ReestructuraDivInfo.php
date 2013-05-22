<?php 
$effect='sliceUpDownLeft';
$randomId=uniqid();
$animSpeed='2000';
?>
		<div class="contenedorInfoTop">
			<div class="contenedorInfoTopImg" id="contenedorInfoTopImg">
				<?php
				$this->widget('application.extensions.nivoslider.ENivoSlider', array(
						'htmlOptions'=>array('id'=>'slider2'.$randomId),
						'id'=>'slider2'.$randomId,
						'config'=>array(
								'effect'=>$effect,
								'slices'=>'2',
								'pauseTime'=>'8000',
								'controlNav'=>false,
								'keyboardNav'=>false,
								'pauseOnHover'=>false,
								'directionNav'=>false,
								'animSpeed'=>$animSpeed,
						),
						'images'=>array( //@array images with images arrays.
								array('src'=>Yii::app()->request->baseUrl.'/images/fondos/3x11.jpg','caption'=>''), //only display image.
								array('src'=>Yii::app()->request->baseUrl.'/images/fondos/3x12.jpg','caption'=>''), //display image and nivo slider caption.
								array('src'=>Yii::app()->request->baseUrl.'/images/fondos/3x13.jpg','caption'=>''), //display image with link.
								array('src'=>Yii::app()->request->baseUrl.'/images/fondos/3x14.jpg','caption'=>''), //display image with nivo slider caption and link reference.
						),
				)
				);				
				?>
			</div>
			<div class="contenedorInfoTopBotones" id="contenedorInfoTopBotones">
			</div>
		</div>
		<div class="contenedorInfoMiddle" id="contenedorInfoMiddle">
			<?php
			$this->widget('application.extensions.nivoslider.ENivoSlider', array(
					'htmlOptions'=>array('id'=>'slider3'.$randomId),
					'id'=>'slider3'.$randomId,
					'config'=>array(
							'effect'=>$effect,
							'slices'=>'2',
							'pauseTime'=>'8000',
							'controlNav'=>false,
							'keyboardNav'=>false,
							'pauseOnHover'=>false,
							'directionNav'=>false,
							'animSpeed'=>$animSpeed,
					),
					'images'=>array( //@array images with images arrays.
							array('src'=>Yii::app()->request->baseUrl.'/images/fondos/4x31.jpg','caption'=>''), //only display image.
							array('src'=>Yii::app()->request->baseUrl.'/images/fondos/4x32.jpg','caption'=>''), //display image and nivo slider caption.
							array('src'=>Yii::app()->request->baseUrl.'/images/fondos/4x33.jpg','caption'=>''), //display image with link.
							array('src'=>Yii::app()->request->baseUrl.'/images/fondos/4x34.jpg','caption'=>''), //display image with nivo slider caption and link reference.
					),
			)
			);			
			?>
		</div>
		<div class="contenedorInfoBottom">
			<div class="contenedorInfoBottomImg" id="contenedorInfoBottomImg">
			<?php
			$this->widget('application.extensions.nivoslider.ENivoSlider', array(
					'htmlOptions'=>array('id'=>'slider4'.$randomId),
					'id'=>'slider4'.$randomId,
					'config'=>array(
						'effect'=>$effect,
						'slices'=>'2',
						'pauseTime'=>'8000',
						'controlNav'=>false,
						'keyboardNav'=>false,
						'pauseOnHover'=>false,
						'directionNav'=>false,
						'animSpeed'=>$animSpeed,
					),
					'images'=>array( //@array images with images arrays.
							array('src'=>Yii::app()->request->baseUrl.'/images/fondos/2x11.jpg','caption'=>''), //only display image.
							array('src'=>Yii::app()->request->baseUrl.'/images/fondos/2x12.jpg','caption'=>''), //display image and nivo slider caption.
							array('src'=>Yii::app()->request->baseUrl.'/images/fondos/2x13.jpg','caption'=>''), //display image with link.
							array('src'=>Yii::app()->request->baseUrl.'/images/fondos/2x14.jpg','caption'=>''), //display image with nivo slider caption and link reference.
					),
				)
			);
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