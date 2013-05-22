<?php
/**
 * @var CActiveForm $form
 */
?>

<div>
    <?php $form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'admin-user-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'class' => 'form-horizontal'
        ),
    )); ?>
    <fieldset>
        <legend>Информация о пользователе</legend>

        <!--        <p class="alert alert-info">Поля с <span class="required">*</span> обязательны.</p>-->

        <?php echo $form->errorSummary($model); ?>

        <div class="control-group<?php if ($model->hasErrors('username')) echo ' error'?>">
            <?php echo $form->label($model, 'username', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'username'); ?>
                <span class="help-inline">
                    <?php
                    if ($model->hasErrors('username'))
                        echo $model->getError('username')?>
                </span>
            </div>
        </div>

        <div class="control-group<?php if ($model->hasErrors('password')) echo ' error'?>">
            <?php echo $form->label($model, 'password', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->passwordField($model, 'password', array('autocomplete' => 'off')); ?>
                <span class="help-inline">
                    <?php
                    if ($model->hasErrors('password'))
                        echo $model->getError('password')?>
                </span>
            </div>
        </div>
        <div class="control-group<?php if ($model->hasErrors('name')) echo ' error'?>">
            <?php echo $form->label($model, 'name', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'name'); ?>
                <span class="help-inline">
                    <?php
                    if ($model->hasErrors('name'))
                        echo $model->getError('name')?>
                </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Роли пользователя</label>

            <div class="controls">
                <?php foreach ($model->roles as $role => $roleName): ?>
                <?php echo CHtml::label($form->checkBox($model, "role[$role]") . $roleName, "roleinp_$role", array('class' => 'checkbox')); ?>
                <?php endforeach; ?>
            </div>
        </div>

    </fieldset>
    <div class="form-actions">
        <button type="submit" class="btn btn-large btn-primary">
            <?php echo ($model->isNewRecord ? 'Добавить' : 'Сохранить')?>
        </button>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->