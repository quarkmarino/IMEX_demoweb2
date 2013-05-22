<div class="form">

    <?php
    /**
     * @var BHorizontalForm $form
     * @var Page $model
     */
    ?>

    <?php $form = $this->beginWidget('BHorizontalForm',
    array(
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => "multipart/form-data",
        )
    )); ?>
    <?php

    echo $form->textFieldControlGroup($model, 'name', array('size' => 60, 'maxlength' => 256));
    echo $form->textFieldControlGroup($model, 'link', array('size' => 60, 'maxlength' => 64));


    echo $form->beginControlGroup($model, 'content');
    $this->widget('ext.tinymce.TinyMce', array(
        'model' => $model,
        'attribute' => 'content',
        'htmlOptions' => array(
            'rows' => 6,
            'cols' => 60,
        ),));
    echo $form->endControlGroup($model);

    //SEO
    echo $form->textFieldControlGroup($model, 'title', array('size' => 60, 'maxlength' => 512));
    echo $form->textAreaControlGroup($model, 'description', array('rows' => 6, 'cols' => 50));
    echo $form->textAreaControlGroup($model, 'keywords', array('rows' => 6, 'cols' => 50));
    ?>

    <div class="form-actions">
        <button type="submit" class="btn btn-large btn-primary">
            <?php echo ($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
        </button>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
