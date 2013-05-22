<?php
$this->breadcrumbs=array(
	'Categorías',
);

$this->menu=array(
	array('label'=>'Nueva Categoría','url'=>array('create')),
	array('label'=>'Ver Entradas','url'=>array('entradas/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('categorias-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Categorías</h2>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'categorias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'campus_id', 'value'=>'$data->campus? $data->campus->nombre :"No definido"'),
		'clave',
		'nombre',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}{delete}'
		),
	),
)); ?>
