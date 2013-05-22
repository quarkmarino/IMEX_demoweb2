<?php
if(!isset($clave))$clave=null;
	$galeria=array();
	$idunico=uniqid();
	$ancho=121;
	$cols=4;
	$entrada=Entradas::model()->findByPk($entradaId);
	$randomId=uniqid();
	$backurl='site/GetContenidoSeccion';
	$seccionId=null;
	$portadaId=1;
	if($entrada->categoria->menuAreaSensible) {
		//var_dump( !!$entrada->categoria->menuAreaSensible->menu ) ;
                //echo "<br />";
		if($entrada->categoria->menuAreaSensible->menu){
			$seccionId=$entrada->categoria->menuAreaSensible->menu->seccion->id;
                        //var_dump( $seccionId );
			$portadaId=$entrada->categoria->menuAreaSensible->menu->seccion->portada->id;
                        //var_dump( $portadaId );
		}
		elseif($entrada->categoria->menuAreaSensible->indexSlider) {
			$base=$entrada->categoria->menuAreaSensible->indexSlider;
			$seccionId=null;
			$portadaId=$base->portada->id;
			$backurl='site/Index';
		}
	}
	else {
		if($entrada->categoria->seccion){
			$base=$entrada->categoria->seccion;
			$seccionId=$base->id;
			$portadaId=$base->portada->id;
			$backurl='site/Index';
		}
		else{
			$backurl='site/Index';
		}
	}
	$subentradas=Entradas::model()->findAllByAttributes(array('categoria_id'=>$categoriaId, 'entrada_antecesor_id'=>$entrada->id));
	$entradaSlider=EntradasSliders::model()->findByAttributes(array('entrada_id'=>$entrada->id));
	if($entradaSlider){
		$galeria=Gallery::model()->findByPk($entradaSlider->slider_id);	
	}
	if($entrada->entradaAntecesor){
		
	}
	$entradasSimilares=Entradas::model()->findAllByAttributes(array('categoria_id'=>$categoriaId, 'entrada_antecesor_id'=>$entrada->entrada_antecesor_id),'entrada_antecesor_id IS NOT NULL');
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
				Yii::app ()->clientScript->registerScript ( 'callMenuSecciones' . $idunico, "
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
                        <?php if($subentradas){	?>
                                    <div style="overflow:hidden;float:left;width:121px;">
                                            <?php
                                                    $cols=3;
                                                    foreach($subentradas as $subentrada){
                                                            echo "<div style='width:121px;margin-top:5px;'>";
                                                            if($subentrada->galleryPhoto) {
                                                                    $img=CHtml::image($subentrada->galleryPhoto->geturl());
                                                                    echo CHtml::link($img,
                                                                            Yii::app()->createUrl('site/GetEntradas',array('entradaId'=>$subentrada->id, 'categoriaId'=>$categoriaId)),
                                                                            array(
                                                                                    'id'=>'subentrada'.$subentrada->id.$idunico,
                                                                            )
                                                                    );
                                                            }
                                                            echo "</div>";
                                                    }
                                            ?>
                                    </div>
                                <?php 
                                }
                                elseif($entradasSimilares) {
                                        $cols=3;
                                        echo '<div style="overflow:hidden;float:left;width:121px;">';
                                        foreach($entradasSimilares as $entradaSimilar) {
                                                $estilo='opacity:.5;';
                                                if($entradaSimilar->id==$entrada->id)$estilo='';
                                                echo "<div style='width:121px;margin-top:5px;'>";
                                                if($entradaSimilar->galleryPhoto){
                                                        $img=CHtml::image($entradaSimilar->galleryPhoto->geturl(),'',array('style'=>$estilo));
                                                        echo CHtml::link($img,
                                                                Yii::app()->createUrl('site/GetEntradas',array('entradaId'=>$entradaSimilar->id, 'categoriaId'=>$categoriaId)),
                                                                array(
                                                                        'id'=>'subentrada'.$entradaSimilar->id.$idunico,
                                                                )
                                                        );
                                                }
                                                echo "</div>";
                                        }
                                        echo '</div>';
                                }
                                if($entrada){
                                echo "<div style='overflow:hidden;float:left;width:".($ancho*$cols+($cols*4))."px;'>";
                                        echo "<div class='entradaTitulo' style='overflow:hidden;'>";
                                                echo "<div class='entradaTituloBotonRegresar' style='min-width:121px; min-height:121px;float:right;overflow:hidden;text-align:right;'>";
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
                                                if($entrada->gallery_photo_id){
                                                        //var_dump(!Yii::app()->user->isGuest, $portadaId==2, Yii::app()->user->id==2, $portadaId==3, Yii::app()->user->id==3, Yii::app()->user->id==1, Yii::app()->user->id==4, Yii::app()->user->id==5, $portadaId==2, Yii::app()->user->id==6, $portadaId==3, Yii::app()->user->id==7 );
                                                        /*echo '<br />';
                                                        echo '<br />';
                                                        echo '<br />';
                                                        var_dump( Yii::app()->user->id, $portadaId );
                                                        var_dump(!Yii::app()->user->isGuest, ($portadaId==2&&Yii::app()->user->id==2), ($portadaId==3&&Yii::app()->user->id==3), (Yii::app()->user->id==1), (Yii::app()->user->id==4), (Yii::app()->user->id==5), ($portadaId==2&&Yii::app()->user->id==6), ($portadaId==3&&Yii::app()->user->id==7) );*/
                                                        if(!Yii::app()->user->isGuest && (
                                                                    ($portadaId==2&&Yii::app()->user->id==2)
                                                                    || ($portadaId==3&&Yii::app()->user->id==3)
                                                                    || (Yii::app()->user->id==1)
                                                                    || (Yii::app()->user->id==4)
                                                                    || (Yii::app()->user->id==5)
                                                                    || ($portadaId==2&&Yii::app()->user->id==6)
                                                                    || ($portadaId==3&&Yii::app()->user->id==7) 
                                                                    || ( $entrada->nombre == 'Misión' )
                                                                ) 
                                                            ){
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
                                        $fondoEntrada=null;
                                        if($entrada->fondo_entrada_id){
                                                $fondoEntrada= GalleryPhoto::model()->findByPk($entrada->fondo_entrada_id);
                                                $fondoEntrada=$fondoEntrada->getUrl();
                                        }
                                        echo "<div id='divScrollBox' style='overflow:hidden;float:left;padding:30px;margin-top:5px;margin-left:5px; min-height:310px; max-height:310px;background-size: 100%;background-repeat: no-repeat; background-image:url(\"".$fondoEntrada."\");width:".($ancho*($cols)-60+($cols*4))."px;overflow:auto;'>";
                                        if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
                                                echo '<div id="editImagenx" style="font-size:10px;position:relative;left:-30px;top:-30px;background-color:#fff;padding-left:2px;padding-bottom:5px;vertical-align:middle;width:80px;height:15px;float:left;z-index:999;opacity:.7;border:0px solid #ccc;overflow:hidden;">';
                                                $this->widget('bootstrap.widgets.TbButton', array(
                                                        'label'=>'Cambiar',
                                                        'type'=>'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                        'size'=>'mini', // null, 'large', 'small' or 'mini',
                                                        'htmlOptions' => array (
                                                    'id' => 'cambiarImagenDeFondo'.$idunico,
                                                'title'=>'Cambiar Imágen de Fondo',
                                                        )					
                                                ));
                                                Yii::app ()->clientScript->registerScript ( 'getModal' . $idunico, "
                                                        $('#cambiarImagenDeFondo".$idunico."').click(function(){
                                                                $('#areamodal').dialog('open');
                                                                $.ajax({
                                                                        'url':'index.php?r=site/GetGalerias',
                                                                        'data':'galeriaId=1&divDestino=divScrollBox&tipoRetorno=1&identificador=1&entradaId=".$entrada->id."',
                                                                        'type':'POST',
                                                                        'cache':false,
                                                                        'success':function(data){
                                                                                $('#areamodal').html(data);
                                                                        }
                                                                });
                                                        });
                                                ");
                                                echo '</div>';
                                        }
                                                $alto=310;
                                                $entradasArchivos=EntradasArchivos::model()->findAllByAttributes(array('entrada_id'=>$entrada->id));
                                                if($entradasArchivos){
                                                        $alto=200;
                                                }
                                                if($entrada->informacion) {
                                                        echo "<div id='editTextoArticulo' style='width:100%;min-height:".$alto."px;height:".$alto."px;float:left;'>";
                                                        if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
                                                                $this->widget('bootstrap.widgets.TbButton', array(
                                                                        'label'=>'Editar Html',
                                                                        'type'=>'primary',
                                                                        'size'=>'mini',
                                                                        'url'=>Yii::app()->CreateUrl('site/GetDialogInformacion',array('entradaId'=>$entrada->id)),
                                                                        'htmlOptions'=>array(
                                                                                'id'=>'butHtml'.$randomId,
                                                                        ),
                                                                ));
                                                                echo "<br>";
                                                                echo "<div id='editableInfoText'>";
                                                                        $this->widget('ext.editable.EditableField', array(
                                                                                'type' => 'textarea',
                                                                                'placement' => 'left',
                                                                                'model' => $entrada,
                                                                                'attribute' => 'informacion',
                                                                                'url' => $this->createUrl('Entradas/Actualizar'),
                                                                                'options' => array(
                                                                                        'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                                                                ),
                                                                        ));
                                                                echo "</div>";
                $this->widget('ext.eguiders.EGuider', array(
                                'id'            => 'segunda',
                                'next'          => 'tercera',
                                'title'         => 'Texto .: Formato HTML :.',
                                'buttons'       => array(
                                                array(
                                                                'name'=>'Anterior',
                                                                'onclick'=> "js:function(){guiders.hideAll(); $('.highlight pre').hide(); guiders.show('primera');}"
                                                ),
                                ),
                                'description'   => 'Puede cambiar el texto de artículos dando click y editando el contenido.<br>Este contenido también admite código HTML.',
                                'overlay'       => true,
                                'xButton'       => true,
                                'show'          => false,
                                'attachTo' => '#editTextoArticulo',
                                'position' => 9,
                                'onShow' => 'js:function(){ $(".highlight pre").show(); }'
                )
                );
                                                        }
                                                        else echo $entrada->informacion;
                                                        echo "</div>";
                                                }
                                                if($entradasArchivos){
                                                        foreach ($entradasArchivos as $entradaArchivo) {
                                                                $archivo=Archivos::model()->findByAttributes(array('id'=>$entradaArchivo->archivo_id));
                                                                echo "<div style='width:100%;float:left;margin-bottom:10px;font-size:10px;'>";
                                                                /*
                                                                $this->widget('bootstrap.widgets.TbButton', array(
                                                                        'label'=>'Imprimir',
                                                                        'icon'=>'print white',
                                                                        'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                        'size'=>'small', // null, 'large', 'small' or 'mini'
                                                                        'htmlOptions'=>array('style'=>'margin-right:10px;'),
                                                                        'url'=>Yii::app()->CreateUrl('site/GetVistaDeImpresion',array('entradaId'=>$entrada->id)),
                                                                ));
                                                                */
                                                                if(!empty($entradaArchivo->titulo))echo $entradaArchivo->titulo;
                                                                else echo $entradaArchivo->archivo->nombre;
                                                                if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
                                                                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                                        'label'=>'',
                                                                                        'url'=>$this->CreateUrl('entradas/EliminarArchivo',array('id'=>$entradaArchivo->id)),
                                                                                        'icon'=>'trash white',
                                                                                        'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                                        'size'=>'mini', // null, 'large', 'small' or 'mini'
                                                                                        'htmlOptions'=>array('style'=>'margin-right:10px;float:right;', 'title'=>'Eliminar archivo'),
                                                                        ));
                                                                }
                                                                $this->widget('bootstrap.widgets.TbButton', array(
                                                                                'label'=>'',
                                                                                'url'=>$this->CreateUrl('entradas/abrirArchivo',array('id'=>$archivo->id)),
                                                                                'icon'=>'eye-open white',
                                                                                'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                                'size'=>'mini', // null, 'large', 'small' or 'mini'
                                                                                'htmlOptions'=>array('style'=>'margin-right:10px;float:right;', 'title'=>'Visualizar archivo', 'target'=>'_blank'),
                                                                ));
                                                                $this->widget('bootstrap.widgets.TbButton', array(
                                                                                'label'=>'',
                                                                                'url'=>$this->CreateUrl('site/Download',array('file'=>$archivo->nombre)),
                                                                                'icon'=>'download-alt white',
                                                                                'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                                'size'=>'mini', // null, 'large', 'small' or 'mini'
                                                                                'htmlOptions'=>array('style'=>'margin-right:10px;float:right;', 'title'=>'Descargar archivo'),
                                                                ));

                                                                echo "</div>";
                                                        }
                                                }
                                                if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
                                                        echo "<div style='width:100%;float:left;margin-top:15px;'>";
                                                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                        'label'=>'Cargar Archivo',
                                                                        'url'=>$this->CreateUrl('entradas/CargarNuevoArchivo',array('id'=>$entrada->id)),
                                                                        'icon'=>'upload white',
                                                                        'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                        'size'=>'small', // null, 'large', 'small' or 'mini'
                                                                        'htmlOptions'=>array('target'=>'_blank')
                                                        ));
                                                        echo "</div>";
                                                }				
                                        echo "</div>";
                        } ?>
                        <div class="contenedorInfoBottom" style='overflow:hidden;float:left;width:<?php echo $ancho*$cols+($cols*4) ?>px;min-width:<?php echo $ancho*$cols+($cols*4) ?>px;'>
                                <div class="contenedorInfoBottomImg" id="contenedorInfoBottomImg" style="min-width:242px;">
                                </div>
                                <div class="contenedorInfoBottomBotones" style="float:right;margin-right:0px;">
                                        <?php 
                                                $this->actionGetMenuSeccionesEscolares($clave);
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
				'data':'entradaId=".$entrada->id."&galeriaId=".$galeria->id."&portadaId=".$portadaId."',
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