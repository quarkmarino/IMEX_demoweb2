<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
?>
$this->actionsMenu = array(
array('label' => 'Добавить <?php echo $this->modelClass; ?>', 'url' => array('create'), 'icon'=>'icon-plus', 'active'=>'/\/create/'),
array('label' => 'Управление <?php echo $this->modelClass; ?>', 'url' => array('admin'), 'icon'=>'icon-list', 'active'=>'/\/admin/'),
);
?>


<h1>Редактирование <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>
<br/>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
