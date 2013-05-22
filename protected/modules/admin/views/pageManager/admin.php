<?php
$this->actionsMenu = array(
    array('label' => 'Добавить страницу', 'url' => array('create'), 'icon' => 'icon-plus', 'active' => '/\/create/'),
);
?>

<h1>Управление текстовыми страницами</h1>
<br/>

<?php $this->widget('BGridView',
    array(
        'id' => 'employee-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'name',
            array(
                'name' => 'link',
                'value' => "Yii::app()->createAbsoluteUrl('site/page',array('link'=>\$data->link))",
                'header' => 'Адрес на сайте'
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{update} {delete}',
            ),
        ),
    )); ?>
