<?php
/**
 * Action for editing StaticData models.
 */
class StaticDataEditor extends CAction
{
    public $storageModel = 'StaticData';
    public $key;
    public $model;
    public $form;
    public $redirectUrl = null;
    public $view = null;
    public $submitLabel = 'Save';

    public function init()
    {

    }

    public function run()
    {
        $model = new DataModel($this->model);
        $dataModelClass = $this->storageModel;
        $dataModel = $dataModelClass::model()->findByPk($this->key);
        $model->setAttributes($dataModel->getDataAttributes(), false);
        if (isset($_POST['DataModel'])) {
            $model->setAttributes($_POST['DataModel']);
            if ($model->validate()) {
                $dataModel->setDataAttributes($model->attributes);
                $dataModel->save();
                //redirect to index
                if (isset($this->redirectUrl)) {
                    $this->getController()->redirect($this->redirectUrl);
                }
            }
        }
        //render

        $content = $this->renderForm($model, true);
        if (isset($this->view)) {
            $this->getController()->render($this->view, array('content' => $content));
        } else {
            $this->getController()->renderText($content);
        }
    }

    private function renderForm($model, $processOutput = false)
    {
        $out = null;
        if ($processOutput) {
            ob_start();
        }

        $form = $this->getController()->beginWidget('BHorizontalForm', array());
        $this->getController()->beginWidget('FormGenerator', array(
            'form' => $form,
            'model' => $model,
            'config' => $this->form,
        ));
        $this->getController()->endWidget();
        echo '<div class="form-actions"><button type="submit" class="btn btn-large btn-primary">',
        $this->submitLabel,
        '</button></div>';
        if ($processOutput) {
            $out = ob_get_clean();
        }
        return $out;
    }
}