<?php $this->pageTitle = Yii::app()->name; 
$effect='sliceUpDownLeft';
$randomId=uniqid();
$animSpeed='2000';
$portadaId=1;
if(isset($_GET['portadaId']))$portadaId=$_GET['portadaId'];
if(Yii::app()->user->isGuest){
	Yii::app()->clientscript->scriptMap['bootstrap-editable.js'] = false;
}
if(Yii::app()->user->hasFlash('success')){
?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('success'); ?>
</div>
<?php
	Yii::app()->clientScript->registerScript('myHideEffect',
		'$(".flash-success").animate({opacity: 1.0}, 5000).fadeOut("slow");',
		CClientScript::POS_READY
	);
}
?>
<div class="contenedorPrincipal" id="contenedorPrincipal">
	<div class="contenedorLeft">
		<div class='contenedorLeftTop'>
			<div class='contenedorLeftTopLogo'>
				<?php 
					echo CHtml::image( Yii::app()->request->baseUrl.'/images/escudo.jpg');
					if(!Yii::app()->user->isGuest && ( (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5) ) ){
						echo "<br>";
						echo CHtml::link('Imágenes del Sitio',array('sliders/GetGaleria','id'=>1),array('style'=>'font-size:10px;','title'=>'Administrar Imágenes del Sitio','target'=>'_BLANK'));
					}
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
		<div class='contenedorLeftMiddle' style="padding-top:2px;">
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
				<?php			
				$indexSlider=IndexSliders::model()->findByAttributes(array('area'=>'1', 'portada_id'=>$portadaId) );
				if($indexSlider) {
					if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
						?>
							<div id="editSliderArea1" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
								<?php
									echo CHtml::link('Editar',$this->CreateUrl('sliders/GetGaleria',array('id'=>$indexSlider->slider_id)), array('title'=>'Editar Imágenes de Slider', 'target'=>'_blank') )
								?>
							</div>
							<div id="changeSliderArea1" style="font-size:10px;position:relative;left:3px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
							<?php
							
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $indexSlider,
									'attribute' => 'slider_id',
									'url' => $this->createUrl('site/ActualizarSlider'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetNuevoSlider",
											data:"sliderId="+editable.value,
											type:"GET",
											success: function(data){
												$("#divSlider1").html(data);
											}
										});
									}',
									'source' => CHtml::listData(Sliders::model()->findAll(),'id','nombre')
								)
							);
							?>
							</div>
						<?php
						$this->widget('ext.eguiders.EGuider', array(
								'id'            => 'intro',
								'next'          => 'first',
								'title'         => 'Bienvenido',
								'description'   => 'Sistema de Ayuda.<br>Mediante simples cuadros de diálogo, este asistente le mostrará como editar su sitio web',
								'overlay'       => true,
								'xButton'       => true,
								'show'          => false,
								'buttons' => array(
									array(
										'name'=>'Siguiente',
										'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('first');}"
									)
								)
							)
						);						
						$this->widget('ext.eguiders.EGuider', array(
								'id'            => 'first',
								'next'          => 'second',
								'title'         => 'Área 1',
								'buttons'       => array(
										array(
												'name'=>'Anterior',
												'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('intro');}"
										),
										array(
												'name'=>'Siguiente',
												'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('second');}"
											)
										),
								'description'   => 'Puede Editar las Imágenes dando clic en este vínculo, en esta área, conocida como el Área 1, se deben colocar imágenes de 2x2 cuadros (300 x 295 px)',
								'overlay'       => true,
								'xButton'       => true,
								'show'          => false,
								'attachTo' => '#editSliderArea1',
								'position' => 11,
								'onShow' => 'js:function(){ $(".highlight pre").show();}'
							)
						);
						
					}
					echo "<div id='divSlider1' style='width:248px;height:242px;overflow:hidden;'>";
					$galeriaId=$indexSlider->slider_id;
					$galeria=Gallery::model()->findByPk($galeriaId);
					$imagenes=GalleryPhoto::model()->getImagenesDeGaleria($galeria->id);
					$images=array();
					foreach ($imagenes as $imagen) {
						$images[]=array('src'=>$imagen->getUrl(),'caption'=>'');
					}
					$numImages=count($images);
					if($numImages==1) {
						echo CHtml::image($imagenes[0]->GetUrl(),'',array('title'=>$indexSlider->id, 'usemap'=>'#menuArea'.$indexSlider->id));
						$areasSensibles=MenusAreasSensibles::model()->findAllByAttributes(array('index_slider_id'=>$indexSlider->id));
						if ( $areasSensibles ) {
							echo CHtml::tag('map',array('name'=>'menuArea'.$indexSlider->id, 'id'=>'menuArea'.$indexSlider->id),false,false);
							foreach ($areasSensibles as $areaSensible) {
								echo CHtml::tag('area',
										array(
												'shape'=>'rect',
												'coords'=> $areaSensible->x1.','.$areaSensible->y1.','.$areaSensible->x2.','.$areaSensible->y2,
												'id'=>'areaSensible'.$areaSensible->id.$randomId,
												'href'=>$this->CreateUrl('site/GetEntradasSeccion',array('areaSensibleId'=>$areaSensible->id))
										)
								);
							}
							echo CHtml::closeTag('map');
						}						
						
						
					}
					else {
						$this->widget('application.extensions.nivoslider.ENivoSlider',
								array(
										'htmlOptions'=>array('id'=>'sliderx','width'=>'253','height'=>'242'),
										'id'=>'sliderx',
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
										'images'=>$images,
								)
						);						
					}
					echo "</div>";
				}
				?>
			</div>
		</div>
		<div class='contenedorLeftBottom' id="contenedorTitulosPortada">
		<?php
			
			Yii::app ()->clientScript->registerScript ( 'callTitulosPortada' . $randomId, "
				$(document).ready(function(){
					$.ajax({
						'url':'index.php?r=site/GetTitulosPortada',
						'data':'portadaId=".$portadaId."',
						'type':'POST',
						'cache':false,
						'success':function(data){
							$('#contenedorTitulosPortada').html(data);
						}
					});
				});
			" );			
		?>
		</div>
	</div>
	<div class="contenedorInfo" id="contenedorInfo">
		<div class="contenedorInfoTop">
			<div class="contenedorInfoTopImg" id="contenedorInfoTopImg" style='width:100%;'>
				<?php
				$indexSlider=IndexSliders::model()->findByAttributes(array('area'=>'2', 'portada_id'=>$portadaId));
				if($indexSlider){
					if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
						?>
							<div id="editSliderArea2" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
								<?php 
									echo CHtml::link('Editar',$this->CreateUrl('sliders/GetGaleria',array('id'=>$indexSlider->slider_id)), array('title'=>'Editar Imágenes de Slider', 'target'=>'_blank') )
								?>
							</div>
							<div id="changeSliderArea2" style="font-size:10px;position:relative;left:3px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
							<?php
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $indexSlider,
									'attribute' => 'slider_id',
									'url' => $this->createUrl('site/ActualizarSlider'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetNuevoSlider",
											data:"sliderId="+editable.value,
											type:"GET",
											success: function(data){
												$("#divSlider2").html(data);
											}
										});
									}',
									'source' => CHtml::listData(Sliders::model()->findAll(),'id','nombre')));
							?>
							</div>
						<?php
						$this->widget('ext.eguiders.EGuider', array(
								'id'            => 'second',
								'next'          => 'third',
								'title'         => 'Área 2',
								'buttons'       => array(
										array(
												'name'=>'Anterior',
												'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('first');}"
										),
										array(
												'name'=>'Siguiente',
												'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('third');}"
										)
								),
								'description'   => 'Puede Editar las Imágenes dando clic en este vínculo, en esta área, conocida como el Área 2, se deben colocar imágenes de 3x1 cuadros (376 x 121 px)',
								'overlay'       => true,
								'xButton'       => true,
								'show'          => false,
								'attachTo' => '#editSliderArea2',
								'position' => 9,
								'onShow' => 'js:function(){ $(".highlight pre").show();}'
						)
						);
						
					}
					echo "<div id='divSlider2' style='width:384px;overflow:hidden;'>";
					$galeriaId=$indexSlider->slider_id;
					$galeria=Gallery::model()->findByPk($galeriaId);
					//$imagenes=GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>$galeria->id),array('order'=>'rank'));
					$imagenes=GalleryPhoto::model()->getImagenesDeGaleria($galeria->id);
					$images=array();
					foreach ($imagenes as $imagen) {
						$images[]=array('src'=>$imagen->getUrl(),'caption'=>'');
					}
					$numImages=count($images);
					if($numImages==1) {
						echo CHtml::image($imagenes[0]->GetUrl());
					}
					else {
						$this->widget('application.extensions.nivoslider.ENivoSlider',
								array(
										'htmlOptions'=>array('id'=>'sliderx','style'=>'width:100%;height:242px;'),
										'id'=>'sliderx2',
										'config'=>array(
												'effect'=>$effect,
												'slices'=>'3',
												'pauseTime'=>'8000',
												'controlNav'=>false,
												'keyboardNav'=>false,
												'pauseOnHover'=>false,
												'directionNav'=>false,
												'animSpeed'=>$animSpeed,
										),
										'images'=>$images,
								)
						);
					}
					echo "</div>";
				}
				?>
			</div>
		</div>
		<div class="contenedorInfoMiddle" id="contenedorInfoMiddle">
				<?php
				$indexSlider=IndexSliders::model()->findByAttributes(array('area'=>'3', 'portada_id'=>$portadaId));
				if($indexSlider) {
					if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
						?>
							<div id="editSliderArea3" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
								<?php 
									echo CHtml::link('Editar',$this->CreateUrl('sliders/GetGaleria',array('id'=>$indexSlider->slider_id)), array('title'=>'Editar Imágenes de Slider', 'target'=>'_blank') )
								?>
							</div>
							<div id="changeSliderArea3" style="font-size:10px;position:relative;left:3px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
							<?php
							
                                                                    $this->widget('ext.editable.EditableField', array(
                                                                            'type' => 'select',
                                                                            'placement' => 'left',
                                                                            'model' => $indexSlider,
                                                                            'attribute' => 'slider_id',
                                                                            'url' => $this->createUrl('site/ActualizarSlider'),
                                                                            'onUpdate' => 'js: function(e, editable) {
                                                                                    $.ajax({
                                                                                            url:"index.php?r=site/GetNuevoSlider",
                                                                                            data:"sliderId="+editable.value,
                                                                                            type:"GET",
                                                                                            success: function(data){
                                                                                                    $("#divSlider3").html(data);
                                                                                            }
                                                                                    });
                                                                            }',
                                                                            'source' => CHtml::listData(Sliders::model()->findAll(),'id','nombre')
                                                                        )
                                                                    );
							?>
							</div>
						<?php
						$this->widget('ext.eguiders.EGuider',
                                                        array(
								'id' => 'third',
								'next' => 'botons0',
								'title' => 'Área 3',
								'buttons' => array(
                                                                        array(
                                                                                'name'=>'Anterior',
                                                                                'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('second');}"
                                                                        ),
                                                                        array(
                                                                                'name'=>'Siguiente',
                                                                                'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('botons0');}"
                                                                        )
								),
								'description' => 'Puede Editar las Imágenes dando clic en este vínculo, en esta área, conocida como el Área 3, se deben colocar imágenes de 4x3 cuadros (504 x 371 px)',
								'overlay' => true,
								'xButton' => true,
								'show' => false,
								'attachTo' => '#editSliderArea3',
								'position' => 9,
								'onShow' => 'js:function(){ $(".highlight pre").show();}'
                                                        )
                                                );
					}
					echo "<div id='divSlider3'>";
					$galeriaId=$indexSlider->slider_id;
                                        //var_dump( $galeriaId );
					$galeria=Gallery::model()->findByPk($galeriaId);
					$imagenes=GalleryPhoto::model()->getImagenesDeGaleria($galeria->id);
					$images=array();
					foreach ($imagenes as $imagen) {
						$images[]=array('src'=>$imagen->getUrl(),'caption'=>'');
					}
					$numImages=count($images);
					if($numImages==1) {
						echo CHtml::image($imagenes[0]->GetUrl());
					}
					else {
						$this->widget('application.extensions.nivoslider.ENivoSlider',
								array(
										'htmlOptions'=>array('id'=>'sliderx','width'=>'253','height'=>'242'),
										'id'=>'sliderx3',
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
										'images'=>$images,
								)
						);
					}
					echo "</div>";
				}
				?>
		</div>
		<div class="contenedorInfoBottom">
			<div class="contenedorInfoBottomImg" id="contenedorInfoBottomImg">
				<?php
				$indexSlider=IndexSliders::model()->findByAttributes(array('area'=>'4', 'portada_id'=>$portadaId));
				if($indexSlider) {
					if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
						?>
							<div id="editSliderArea4" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
								<?php 
									echo CHtml::link('Editar',$this->CreateUrl('sliders/GetGaleria',array('id'=>$indexSlider->slider_id)), array('title'=>'Editar Imágenes de Slider', 'target'=>'_blank') )
								?>
							</div>
							<div id="changeSliderArea4" style="font-size:10px;position:relative;left:3px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
							<?php
							
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $indexSlider,
									'attribute' => 'slider_id',
									'url' => $this->createUrl('site/ActualizarSlider'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetNuevoSlider",
											data:"sliderId="+editable.value,
											type:"GET",
											success: function(data){
												$("#divSlider4").html(data);
											}
										});
									}',
									'source' => CHtml::listData(Sliders::model()->findAll(),'id','nombre')));
							?>
							</div>
						<?php
						$this->widget('ext.eguiders.EGuider', array(
								'id'            => 'botons0',
								'next'          => 'botons1',
								'title'         => 'Área 4',
								'buttons'       => array(
										array(
												'name'=>'Anterior',
												'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('third');}"
										),
										array(
												'name'=>'Siguiente',
												'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('botons1');}"
										)
								),
								'description'   => 'Puede Editar las Imágenes dando clic en este vínculo, en esta área, conocida como el Área 4, se deben colocar imágenes de 2x1 cuadros (247 x 119 px)',
								'overlay'       => true,
								'xButton'       => true,
								'show'          => false,
								'attachTo' => '#editSliderArea4',
								'position' => 9,
								'onShow' => 'js:function(){ $(".highlight pre").show();}'
						)
						);						
					}
					echo "<div id='divSlider4'>";
					$galeriaId=$indexSlider->slider_id;
					$galeria=Gallery::model()->findByPk($galeriaId);
					$imagenes=GalleryPhoto::model()->getImagenesDeGaleria($galeria->id);
					$images=array();
					foreach ($imagenes as $imagen) {
						$images[]=array('src'=>$imagen->getUrl(),'caption'=>'');
					}
					$numImages=count($images);
					if($numImages==1) {
						echo CHtml::image($imagenes[0]->GetUrl(),'',array('title'=>$indexSlider->id, 'usemap'=>'#menuArea'.$indexSlider->id));
						$areasSensibles=MenusAreasSensibles::model()->findAllByAttributes(array('index_slider_id'=>$indexSlider->id));
						if ( $areasSensibles ) {
							echo CHtml::tag('map',array('name'=>'menuArea'.$indexSlider->id, 'id'=>'menuArea'.$indexSlider->id),false,false);
							foreach ($areasSensibles as $areaSensible) {
								echo CHtml::tag('area',
										array(
												'shape'=>'rect',
												'coords'=> $areaSensible->x1.','.$areaSensible->y1.','.$areaSensible->x2.','.$areaSensible->y2,
												'id'=>'areaSensible'.$areaSensible->id.$randomId,
												'href'=>$this->CreateUrl('site/GetEntradasSeccion',array('areaSensibleId'=>$areaSensible->id))
										)
								);
							}
							echo CHtml::closeTag('map');
						}
					}
					else {
						$this->widget('application.extensions.nivoslider.ENivoSlider',
								array(
										'htmlOptions'=>array('id'=>'sliderx','width'=>'253','height'=>'242'),
										'id'=>'sliderx4',
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
										'images'=>$images,
								)
						);
					}
					echo "</div>";
				}
				?>
			</div>
			<div class="contenedorInfoBottomBotones">
			<?php 
				$this->actionGetMenuSeccionesEscolares();
			?>
			</div>
		</div>
	</div>
</div>