<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria_id')); ?>:</b>
	<?php echo CHtml::encode($data->categoria_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entrada_antecesor_id')); ?>:</b>
	<?php echo CHtml::encode($data->entrada_antecesor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informacion')); ?>:</b>
	<?php echo CHtml::encode($data->informacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_photo_id')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_photo_id); ?>
	<br />


</div>