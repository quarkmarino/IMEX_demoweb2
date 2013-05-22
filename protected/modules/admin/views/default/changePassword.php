<?php
/**
 * @var DefaultController $this
 * @var ChangePasswordForm $model
 */
?>
<div class="container">
    <div class="row">
        <div class="span12">
            <?php
            /**
             * @var CActiveForm $form
             */
            $form = $this->beginWidget('CActiveForm', array(
                'htmlOptions' => array(
                    'class' => 'form-horizontal'
                )));
            ?>
            <fieldset>
                <legend>Изменение пароля входа в систему управления сайтом</legend>

                <div class="control-group<?php if ($model->hasErrors('currentPassword')) echo ' error'?>">
                    <?php echo $form->label($model, 'currentPassword', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->passwordField($model, 'currentPassword', array('autocomplete' => 'off')); ?>
                        <span class="help-inline">
                        <?php if ($model->hasErrors('currentPassword')) echo $model->getError('currentPassword')?>
                            </span>
                    </div>
                </div>

                <div class="control-group<?php if ($model->hasErrors('password')) echo ' error'?>">
                    <?php echo $form->label($model, 'password', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->passwordField($model, 'password', array('autocomplete' => 'off')); ?>
                        <span class="help-inline">
                        <?php if ($model->hasErrors('password')) echo $model->getError('password')?>
                            </span>
                    </div>
                </div>
                <div class="control-group<?php if ($model->hasErrors('passwordVerify')) echo ' error'?>">
                    <?php echo $form->label($model, 'passwordVerify', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->passwordField($model, 'passwordVerify', array('autocomplete' => 'off')); ?>
                        <span class="help-inline">
                        <?php if ($model->hasErrors('passwordVerify')) echo $model->getError('passwordVerify')?>
                            </span>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-large btn-primary">Изменить пароль</button>
                </div>
            </fieldset>
            <?php
            $this->endWidget();
            ?>
        </div>
    </div>
</div>