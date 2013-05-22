<?php
/**
 * @var AdminUser $model
 * @var UserController $this
 */
?>
<?php

$this->menu = array(
    array('label' => 'Действия', 'itemOptions' => array('class' => 'nav-header')),
    array('label' => '<i class="icon-plus"></i>Добавить пользователя', 'url' => array('/admin/user/create')),
);
?>
<?php $this->beginContent('layout') ?>
<h1>Пользователи системы управления сайтом</h1>
<br/>

<?php $this->widget(
    'BGridView',
    array(
        'id' => 'admin-user-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'username',
            'name',
            array(
                'class' => 'CButtonColumn',
                'template' => '{update} {delete}',
            ),
        ),
    )); ?>
<?php $this->endContent(); ?>