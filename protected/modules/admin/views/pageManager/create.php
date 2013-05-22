<?php
$this->actionsMenu = array(
    array('label' => 'Управление текстовыми страницами', 'url' => array('admin'), 'icon' => 'icon-list', 'active' => '/\/admin/'),
);
?>

<h1>Добавить страницу</h1>
<br/>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>