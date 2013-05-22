<?php
$this->breadcrumbs=array(
	'Entradas',
);

$this->menu=array(
	array('label'=>'Nueva Entrada','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('entradas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Entradas</h2>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'entradas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'campus', 'value'=>'$data->categoria->campus ? $data->categoria->campus->nombre : "No definido"'),
		array('name'=>'categoria_id', 'value'=>'$data->categoria->nombre'),
		'nombre',
		array('name'=>'entrada_antecesor_id', 'value'=>'$data->entradaAntecesor ? $data->entradaAntecesor->nombre : "--"'),
		array('name'=>'informacion','type'=>'raw','value'=>'substr($data->informacion,0,50)."..."'),
		array('name'=>'gallery_photo_id', 'type'=>'raw', 'value'=>'$data->galleryPhoto? CHtml::image($data->galleryPhoto->getUrl(),"",array("width"=>"40")) :"No definida" '),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}{delete}'
		),
	),
)); ?>
