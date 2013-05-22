<?php $this->pageTitle = Yii::app()->name;
$effect='sliceUpDownLeft';
$randomId=uniqid();
$animSpeed='2000';
$seccion=Secciones::model()->findByPk($seccionId);
$portadaId=$seccion->portada->id;
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
						'data':'portadaId=".$portadaId."&seccionId=".$seccionId."',
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
				<?php
					$menuArea=Menus::model()->findByAttributes(array('seccion_id'=>$seccion->id, 'area'=>'1'));
					if($menuArea) {
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							?>
								<div id="editMenuArea1" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
									<?php
									$this->widget('ext.editable.EditableField', array(
										'type' => 'select',
										'placement' => 'left',
										'model' => $menuArea,
										'attribute' => 'gallery_photo_id',
										'url' => $this->createUrl('site/ActualizarImagenDeMenu'),
										'onUpdate' => 'js: function(e, editable) {
											$.ajax({
												url:"index.php?r=site/GetNuevaImagenDeMenu",
												data:"menuId='.$menuArea->id.'",
												type:"GET",
												success: function(data){
													$("#divImagenArea1").html(data);
												}
											});
										}',
										'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1)),'id','name')
									));
									?>
								</div>
							<?php 						
						}
						echo "<div id='divImagenArea1'>";
                                                    echo CHtml::image($menuArea->galleryPhoto->getUrl(),'',array('usemap'=>'#menuArea'.$menuArea->id));
                                                    $areasSensibles=MenusAreasSensibles::model()->findAllByAttributes(array('menu_id'=>$menuArea->id));
                                                    if ( $areasSensibles ) {
                                                            echo CHtml::tag('map',array('name'=>'menuArea'.$menuArea->id, 'id'=>'menuArea'.$menuArea->id),false,false);
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
						echo "</div>";
					}
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
					$menuArea=Menus::model()->findByAttributes(array('seccion_id'=>$seccion->id, 'area'=>'2'));
					if($menuArea) {
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							?>
								<div id="editMenuArea2" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
								<?php
									$this->widget('ext.editable.EditableField', array(
										'type' => 'select',
										'placement' => 'left',
										'model' => $menuArea,
										'attribute' => 'gallery_photo_id',
										'url' => $this->createUrl('site/ActualizarImagenDeMenu'),
										'onUpdate' => 'js: function(e, editable) {
											$.ajax({
												url:"index.php?r=site/GetNuevaImagenDeMenu",
												data:"menuId='.$menuArea->id.'",
												type:"GET",
												success: function(data){
													$("#divImagenArea2").html(data);
												}
											});
										}',
										'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1)),'id','name')
									));
									?>
								</div>
							<?php 						
						}
						echo "<div id='divImagenArea2'>";						
						
						echo CHtml::image($menuArea->galleryPhoto->getUrl(),'',array('usemap'=>'#menuArea'.$menuArea->id));
						$areasSensibles=MenusAreasSensibles::model()->findAllByAttributes(array('menu_id'=>$menuArea->id));
						if ( $areasSensibles ) {
							echo CHtml::tag('map',array('name'=>'menuArea'.$menuArea->id, 'id'=>'menuArea'.$menuArea->id),false,false);
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
						echo "</div>";
					}		
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
					$menuArea=Menus::model()->findByAttributes(array('seccion_id'=>$seccion->id, 'area'=>'3'));
					if($menuArea) {
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							?>
							<div id="editMenuArea3" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
							<?php
								$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $menuArea,
									'attribute' => 'gallery_photo_id',
									'url' => $this->createUrl('site/ActualizarImagenDeMenu'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetNuevaImagenDeMenu",
											data:"menuId='.$menuArea->id.'",
											type:"GET",
											success: function(data){
												$("#divImagenArea3").html(data);
											}
										});
									}',
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1)),'id','name')
								));
							?>
							</div>
							<?php 						
						}
						echo "<div id='divImagenArea3'>";						
						echo CHtml::image($menuArea->galleryPhoto->getUrl(),'',array('usemap'=>'#menuArea'.$menuArea->id));
						$areasSensibles=MenusAreasSensibles::model()->findAllByAttributes(array('menu_id'=>$menuArea->id), 'id != 16');
						if ( $areasSensibles ) {
							echo CHtml::tag('map',array('name'=>'menuArea'.$menuArea->id, 'id'=>'menuArea'.$menuArea->id),false,false);
							foreach ($areasSensibles as $areaSensible) {
								$url='site/GetEntradasSeccion';
								$params=array('areaSensibleId'=>$areaSensible->id);
                                                                $target='_self';
                                                                $url=$this->CreateUrl($url,$params);
								$categoria=Categorias::model()->findByAttributes(array('menu_area_sensible_id'=>$areaSensible->id));
								if($categoria) {
									$vistaEspecial=$categoria->vista_especial;
									if($vistaEspecial){
										if($vistaEspecial==4||$vistaEspecial==7){
                                          
                                                                                        $url='http://modeloeducativosimex.com/demointranet';
											$params=array();
                                                                                        $target='_blank';
										}
										if($vistaEspecial==5){
											$url='http://modeloeducativosimex.com/demointranet';
											
                                                                                        $target='_blank';
										}										
																			
									}elseif($areaSensible->id==21)
                                                                        {
                                                                          $url='http://modeloeducativosimex.com/demointranet';  
                                                                          $target='_blank';
                                                                        }
								}

								echo CHtml::tag('area',
										array(
												'shape'=>'rect', 
												'coords'=> $areaSensible->x1.','.$areaSensible->y1.','.$areaSensible->x2.','.$areaSensible->y2, 
												'id'=>'areaSensible'.$areaSensible->id.$randomId, 
												'href'=>$url,
                                                                                                'target'=>$target
										)
								);
							}
							echo CHtml::closeTag('map');	
						}
						echo "</div>";
					}
		
		?>
		</div>
		<div class="contenedorInfoBottom">
			<div class="contenedorInfoBottomImg" id="contenedorInfoBottomImg">
			<?php
					$menuArea=Menus::model()->findByAttributes(array('seccion_id'=>$seccion->id, 'area'=>'4'));
					if($menuArea) {
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							?>
							<div id="editMenuArea4" style="font-size:10px;position:relative;left:0px;top:0px;background-color:#fff;padding-left:20px;padding-bottom:5px;vertical-align:middle;width:50px;height:15px;float:left;z-index:999;opacity:.7;border:1px solid #ccc;">
							<?php
								$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'left',
									'model' => $menuArea,
									'attribute' => 'gallery_photo_id',
									'url' => $this->createUrl('site/ActualizarImagenDeMenu'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetNuevaImagenDeMenu",
											data:"menuId='.$menuArea->id.'",
											type:"GET",
											success: function(data){
												$("#divImagenArea4").html(data);
											}
										});
									}',
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1)),'id','name')
								));
							?>
							</div>
						<?php 						
						}
						echo "<div id='divImagenArea4'>";						
												
						echo CHtml::image($menuArea->galleryPhoto->getUrl(),'',array('usemap'=>'#menuArea'.$menuArea->id));
						$areasSensibles=MenusAreasSensibles::model()->findAllByAttributes(array('menu_id'=>$menuArea->id));
						if ( $areasSensibles ) {
							echo CHtml::tag('map',array('name'=>'menuArea'.$menuArea->id, 'id'=>'menuArea'.$menuArea->id),false,false);
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
<script>
	function ventanaModal(){
	    <?php echo CHtml::ajax(array(
	            'url'=>array('formatoInscripciones/Create'),
	            'data'=> "js:$(this).serialize()",
	            'type'=>'post',
	            'dataType'=>'json',
	    		'cache'=>false,
	            'success'=>"function(data){
	                if (data.status == 'failure'){
	                    $('#areamodal').html(data.div);
						$('#areamodal form').submit(ventanaModal);
	                }
	                else{
						$('#areamodal').dialog('close');
	                }
	            } ",
	            ))?>;
	    return false; 
	}
</script>
<?php
if(isset($_GET['getModal'])) {
	Yii::app ()->clientScript->registerScript ( 'getModal' . uniqid(), "
		$(document).ready(function(){
			$('#areamodal').dialog('open');
			ventanaModal();
		});
	");
}
?>