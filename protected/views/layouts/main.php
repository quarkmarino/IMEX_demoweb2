<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<?php 

$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
		'id'=>'areamodal',
		'options'=>array(
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>700,
				'height'=>530,
		),
));
$this->endWidget();

?>

<div class="container" id="page" style="width:894px;">
	<div id="mainmenu">
	<?php 	
		$idPortada=null;
		$portadaId=1;
		if(isset($_GET['portadaId']))$idPortada=$_GET['portadaId'];
		if(isset($_POST['portadaId']))$idPortada=$_POST['portadaId'];
		if(!Yii::app()->user->isGuest){
		?>
			<div style="float:left;font-size:10px;margin-left:20px;">
			<?php 
				echo CHtml::link('Cerrar Sesión', Yii::app()->CreateUrl('login/logout'), array('style'=>'margin-right:10px;'));
			?>
			</div>
			<div style="float:left;margin-right:8px;">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
    			'label'=>'',
    			'type'=>'info',
    			'size'=>'mini',
    			'icon'=>'question-sign white',
				'htmlOptions'=>array('title'=>'Mostrar Ayuda','onclick'=> "js:guiders.hideAll(); $('.highlight pre').hide(); guiders.show('intro');")
			)); ?>
			</div>
		<?php	
		}
		
		/*
		$this->widget('ext.mbmenu.MbMenu',array(
			'encodeLabel'=>false,
			'items'=>array(
				array('label'=>CHtml::image(Yii::app()->request->baseUrl.'/images/home.jpg'),'url'=>array('site/Index')),
				array('label'=>CHtml::image(Yii::app()->request->baseUrl.'/images/quienessomos.jpg'),'url'=>array('site/GetContenidoSeccion','seccionId'=>'1')),
				array('label'=>CHtml::image(Yii::app()->request->baseUrl.'/images/admisiones.jpg'), 'url'=>array('site/GetContenidoSeccion','seccionId'=>'2')),
				array('label'=>CHtml::image(Yii::app()->request->baseUrl.'/images/comunidadimex.jpg'), 'url'=>array('site/ComunidadImex','portadaId'=>$idPortada)),
			),
		));
		*/
		?>
		
		<div id="nav-container" style="float:right;">
			<div id="nav-bar">
				<div style="float:left;position:relative;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'HOME'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteHOME'.$modeloBoton->id));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('site/Index'),array('style'=>'margin:0px;position:relative;left:0px;top:0px;'));
						}
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							echo '<div id="HOMEBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstanteHOME'.$modeloBoton->id.'").attr("src", data);
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
				<div style="float:left;position:relative;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'QUIENESSOMOS'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteQUIENESSOMOS'.$modeloBoton->id));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('site/GetContenidoSeccion',array('seccionId'=>'1')),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							echo '<div id="QUIENESSOMOSBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstanteQUIENESSOMOS'.$modeloBoton->id.'").attr("src", data);
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
				<div style="float:left;position:relative;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'ADMISIONES'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteADMISIONES'.$modeloBoton->id));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('site/GetContenidoSeccion',array('seccionId'=>'2')),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							echo '<div id="ADMISIONESBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstanteADMISIONES'.$modeloBoton->id.'").attr("src", data);
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
				<div style="float:left;position:relative;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'COMUNIDADIMEX'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteCOMUNIDADIMEX'.$modeloBoton->id));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('site/ComunidadImex',array('portadaId'=>$idPortada)),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							echo '<div id="COMUNIDADIMEXBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstanteCOMUNIDADIMEX'.$modeloBoton->id.'").attr("src", data);
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
			</div>
		</div>
		
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<?php echo $content; ?>
	<div class="clear"></div>
	<div id="footer">
		<div id="nav-container" style="float:right;">
			<div id="nav-bar">
				<div style="float:left;position:relative;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'TWITTER'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteTWITTER'.$modeloBoton->id));
							echo CHtml::link($imagenBOTON,$modeloBoton->link,array('style'=>'margin:0px;','target'=>'_blank', 'id' => 'twitter-link'));
						}
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							echo '<div id="TWITTERBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'select',
									'placement' => 'bottom',
									'model' => $modeloBoton,
									'attribute' => 'gallery_photo_id',
									'url' => $this->createUrl('site/ActualizarBotonConstante'),
									'onUpdate' => 'js: function(e, editable) {
										$.ajax({
											url:"index.php?r=site/GetUrlImagen",
											data:"id="+editable.value,
											type:"GET",
											success: function(data){
												$("#botonConstanteTWITTER'.$modeloBoton->id.'").attr("src", data);
											}
										});
									}',
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
							echo '<div id="TWITTERBUTTON-LINK'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:20px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'text',
									'placement' => 'top',
									'model' => $modeloBoton,
									'attribute' => 'link',
									'url' => $this->createUrl('site/ActualizarBotonConstante'),
									'onUpdate' => 'js: function(e, editable) {
                                                                                $("#twitter-link").attr("href", editable.value);
									}',
									//'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
						}
					?>
				</div>			
				<div style="float:left;position:relative;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'FACEBOOK'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteFACEBOOK'.$modeloBoton->id));
                                                         //   var_dump(Yii::app()->params['facebook_link']);
                                                        echo CHtml::link($imagenBOTON,$modeloBoton->link,array('style'=>'margin:0px;','target'=>'_blank','id'=>'facebook-link'));
						}
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							echo '<div id="FACEBOOKBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstanteFACEBOOK'.$modeloBoton->id.'").attr("src", data);
											}
										});
									}',
									'source' => CHtml::listData(GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>1),array('order'=>'name')), 'id', 'name'),
									'options' => array(
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
									),
							));
							echo "</div>";
                                                        
                                                        echo '<div id="FACEBOOKBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:20px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
							$this->widget('ext.editable.EditableField', array(
									'type' => 'text',
									'placement' => 'top',
									'model' => $modeloBoton,
									'attribute' => 'link',
									'url' => $this->createUrl('site/ActualizarBotonConstante'),
									'onUpdate' => 'js: function(e, editable) {
                                                                          $("#facebook-link").attr("href", editable.value);  
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
				<div style="float:left;position:relative;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'RECOMIENDAELSITIO'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteRECOMIENDAELSITIO'.$modeloBoton->id));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('#'),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							echo '<div id="RECOMIENDAELSITIOBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstanteRECOMIENDAELSITIO'.$modeloBoton->id.'").attr("src", data);
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
				<div style="float:left;position:relative;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'MAPADELSITIO'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstanteMAPADELSITIO'.$modeloBoton->id));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('#'),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							echo '<div id="MAPADELSITIOBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstanteMAPADELSITIO'.$modeloBoton->id.'").attr("src", data);
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
				<div style="float:left;position:relative;">
					<?php
						$imagenBOTON=BotonesConstantes::model()->findByAttributes(array('clave'=>'POLITICASDEPRIVACIDAD'));
						$modeloBoton=$imagenBOTON;
						if($imagenBOTON){
							$imagenBOTON=GalleryPhoto::model()->findByPk($imagenBOTON->gallery_photo_id);
							if($imagenBOTON)
								$imagenBOTON=CHtml::image($imagenBOTON->GetUrl(), '', array('id'=>'botonConstantePOLITICASDEPRIVACIDAD'.$modeloBoton->id));
							echo CHtml::link($imagenBOTON,$this->CreateUrl('site/GetPoliticasDePrivacidad'),array('style'=>'margin:0px;'));
						}
						if(!Yii::app()->user->isGuest && (($portadaId==2&&Yii::app()->user->id==2) || ($portadaId==3&&Yii::app()->user->id==3) || (Yii::app()->user->id==1) || (Yii::app()->user->id==4)|| (Yii::app()->user->id==5)|| ($portadaId==2&&Yii::app()->user->id==6)|| ($portadaId==3&&Yii::app()->user->id==7) ) ){
							echo '<div id="POLITICASDEPRIVACIDADBUTTON'.$modeloBoton->id.'" style="font-size:8px;position:absolute;left:0px;top:1px;background-color:#fff;padding-left:0px;padding-bottom:0px;vertical-align:middle;width:50px;height:15px;float:left;opacity:.8;border:1px solid #ccc;overflow:hidden;">';
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
												$("#botonConstantePOLITICASDEPRIVACIDAD'.$modeloBoton->id.'").attr("src", data);
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
			</div>
		</div>	
	
	
	
		<?php
		/* 
		$this->widget('ext.mbMenu.MbMenu',array(
			'encodeLabel'=>false,
			'items'=>array(
				array('label'=>CHtml::image(Yii::app()->request->baseUrl.'/images/twitter.jpg'),'url'=>array('#')),
				array('label'=>CHtml::image(Yii::app()->request->baseUrl.'/images/facebook.jpg'),'url'=>array('#')),
				array('label'=>CHtml::image(Yii::app()->request->baseUrl.'/images/recomiendaelsitio.jpg'),'url'=>array('#')),
				array('label'=>CHtml::image(Yii::app()->request->baseUrl.'/images/mapadelsitio.jpg'),'url'=>array('#')),
				array('label'=>CHtml::image(Yii::app()->request->baseUrl.'/images/politicasdeprivacidad.jpg'), 'url'=>array('site/GetPoliticasDePrivacidad'),'htmlOptions'=>array('target'=>'_BLANK')),
			),
		));
		*/ 
		?>
	</div><!-- footer -->
</div><!-- page -->
</body>
</html>