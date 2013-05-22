<?php
$galeria=Gallery::model()->findByPk($galeriaId);
$photos=GalleryPhoto::model()->findAllByAttributes(array('gallery_id'=>$galeria->id));
foreach ($photos as $photo) {
	echo "<div class='span-5'>".CHtml::image($photo->getPreview());
	$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
			'size'=>'mini',
			'label'=>'',
			'icon'=>'hand-left white',
			'htmlOptions'=>array('id'=>'addImage'.$photo->id,'title'=>'Agregar esta Imágen','onclick'=>'js:tinyMCE.execCommand("mceInsertContent",false,"<img src=\''.$photo->getUrl().'\'>")'),
	));
	echo "</div>";
}
?>