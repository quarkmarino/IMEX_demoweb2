<?php
$this->breadcrumbs=array(
	'Campuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Campus','url'=>array('index')),
	array('label'=>'Create Campus','url'=>array('create')),
	array('label'=>'Update Campus','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Campus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Campus','url'=>array('admin')),
);
?>

<h1>View Campus #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
