<?php
$this->breadcrumbs=array(
	'Entradases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Entradas','url'=>array('index')),
	array('label'=>'Create Entradas','url'=>array('create')),
	array('label'=>'Update Entradas','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Entradas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entradas','url'=>array('admin')),
);
?>

<h1>View Entradas #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'categoria_id',
		'entrada_antecesor_id',
		'informacion',
		'gallery_photo_id',
	),
)); ?>
