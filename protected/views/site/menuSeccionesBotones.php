<?php
  Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui.min.js', CClientScript::POS_HEAD);
	$idunico=uniqid();
	$secciones=Secciones::model()->findAllByAttributes(array('portada_id'=>$portadaId),array('order'=>'orden'));
	$numBoton=1;
        $photos_models = GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name'));
        /*foreach( $photos_models as $index => $photo ){
            echo $photo->name.'<br />';
        }*/
        $photos = CHtml::listData($photos_models, 'id', 'name');
        $i = 0;
        foreach( $photos as $index => $value ){
            $_photos[$i++][$index] = $value;
        }
        //$photos = $_photos;
        //print_r( $photos );
	foreach($secciones as $seccion) {
		$imagen=GalleryPhoto::model()->findByPk($seccion->imagen_boton_id);
		if($imagen){
			echo "<div id='seccion".$seccion->id."' style='padding-bottom:0px;position:relative;'>";

			if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
				echo '<div id="editBoton'.$numBoton.'" style="font-size:10px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:10px;padding-bottom:5px;vertical-align:middle;width:100px;height:15px;float:left;z-index:999;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
				/*
				$this->widget('bootstrap.widgets.TbButton', array(
						'label'=>'Cambiar',
						'type'=>'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
						'size'=>'mini', // null, 'large', 'small' or 'mini',
						'htmlOptions' => array (
								'id' => 'cambiarImagenSeccion'.$seccion->id.$idunico,
								'title'=>'Cambiar Imágen de Fondo',
						)
				));
				Yii::app ()->clientScript->registerScript ( 'getModal'.$seccion->id.$idunico, "
					$('#cambiarImagenSeccion".$seccion->id.$idunico."').click(function(){
						$('#areamodal').dialog({autoOpen:false,modal:true,width:700,height:530}); 
						$('#areamodal').dialog('open');
						$.ajax({
							'url':'index.php?r=site/GetGalerias',
							'data':'galeriaId=1&divDestino=divScrollBox&tipoRetorno=1&identificador=2&entradaId=".$seccion->id."',
							'type':'POST',
							'cache':false,
							'success':function(data){
								$('#areamodal').html(data);
							}
						});
					});
				");				
				*/
				$this->widget('ext.editable.EditableField', array(
						'type' => 'select',
						'placement' => 'left',
						'model' => $seccion,
						'attribute' => 'imagen_boton_id',
						'url' => $this->createUrl('site/ActualizarImagenBotonMenu'),
						'onUpdate' => 'js: function(e, editable) {
							$.ajax({
								url:"index.php?r=site/GetUrlImagen",
								data:"id="+editable.value,
								type:"GET",
								success: function(data){
									$("#botonMenuSeccion'.$seccion->id.'").attr("src", data);
								}
							});
						}',
						'source' => $photos,
						'options' => array(
								'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
						),
				));
				echo '</div>';

				echo '<div id="editBotonActivo'.$numBoton.'" style="font-size:10px;position:absolute;left:120px;top:1px;background-color:#fff;padding-left:10px;padding-bottom:5px;vertical-align:middle;width:100px;height:15px;float:left;z-index:999;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
					$this->widget('ext.editable.EditableField', array(
						'type' => 'select',
						'placement' => 'left',
						'model' => $seccion,
						'attribute' => 'imagen_boton_activo_id',
						'url' => $this->createUrl('site/ActualizarImagenBotonActivoMenu'),
						'source' => $photos,
						'options' => array(
								'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
						),
					));
				echo '</div>';			
			
			}
			$url='site/GetContenidoSeccion';
			$params=array('seccionId'=>$seccion->id);
			$url=$this->CreateUrl($url,$params);
			if($seccion->vista_especial) {
				if($seccion->vista_especial==2){
					$url='site/GetFormularioExAlumnos';
					$params=array('vistaEspecialId'=>$seccion->vista_especial, 'seccionId'=>$seccion->id);
					$url=$this->CreateUrl($url,$params);
				}
			}
                        //var_dump( $seccion->id );
			if($seccion->categorias){
				$url='site/GetEntradasSeccion';
				$params=array('seccionId'=>$seccion->id);
				$url=$this->CreateUrl($url,$params);
			}
			if($seccion->vista_especial==3){
				$url='site/Contacto';
				$params=array('seccionId'=>$seccion->id);
				$url=$this->CreateUrl($url,$params);
			}
			if($seccion->vista_especial==10 || $seccion->id == 7 || $seccion->id == 11 ){
                                $params['portadaId'] = null;
                                if( $_POST['portadaId'] && isset( $_POST['portadaId'] ) )
                                    $params = array( 'portadaId' => $_POST['portadaId'] );
                                $url=$this->CreateUrl( 'site/comunidadImex', $params );
			}
			
			//var_dump('first', isset($_POST['seccionId']), $_POST['seccionId']==$seccion->id);
			if(isset($_POST['seccionId']) && $_POST['seccionId']==$seccion->id){
				$imagen=GalleryPhoto::model()->findByPk($seccion->imagen_boton_activo_id);
				$imagenBoton=CHtml::image( $imagen->GetUrl(), '', array('id'=>'botonMenuSeccion'.$seccion->id) );
			}
			//var_dump('second', isset($seccionId), $seccionId,$seccion->id);
			if(isset($seccionId) && $seccionId==$seccion->id){
				$imagen=GalleryPhoto::model()->findByPk($seccion->imagen_boton_activo_id);
				$imagenBoton=CHtml::image( $imagen->GetUrl(), '', array('id'=>'botonMenuSeccion'.$seccion->id) );
			}
			else{
				$imagenBoton=CHtml::image( $imagen->GetUrl(), '', array('id'=>'botonMenuSeccion'.$seccion->id, 'style'=>'padding-bottom:0px;') );
			}
			
			echo CHtml::link($imagenBoton,$url,array('style'=>'position:relative;left:0px;top:0px;'));
			
			echo "</div>";
			$numBoton++;
		}
	}
?>