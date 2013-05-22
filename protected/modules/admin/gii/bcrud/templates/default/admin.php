<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
?>

$this->actionsMenu = array(
    array('label' => 'Добавить <?php echo $this->modelClass; ?>', 'url' => array('create'), 'icon' => 'icon-plus', 'active' => '/\/create/'),
);

?>

<h1>Управление <?php echo $label; ?></h1>
<br/>
<?php echo "<?php"; ?> $this->widget('BGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'CButtonColumn',
            'template' => '{update} {delete}',
		),
	),
)); ?>
