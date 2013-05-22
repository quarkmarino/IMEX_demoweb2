<?php
/** Usage example
 *   class PageController extends AdminController
 *   {
 *       public function actions()
 *       {
 *           return array(
 *               'index' => array(
 *                   'class' => 'StaticPageEditor',
 *
 *                   'submitLabel' => 'Сохранить',
 *                   'section' => 'root',
 *                   'key' => 'index',
 *                   'view' => 'static_editor',
 *                   'model' => array(
 *                       'schema' => array(
 *                           'item1' => array(
 *                               'label' => 'Item #1',
 *                               'default' => null,
 *                           ),
 *                       ),
 *                       'rules' => array(),
 *                   ),
 *                   'form' => array(
 *                       array(
 *                           'type' => 'simpleInput',
 *                           'name' => 'textField',
 *                           'attribute' => 'item1',
 *                           'options' => array(),
 *                       ),
 *                   ),
 *               ),
 *           );
 *       }
 *   }
 */

class StaticPageEditor extends CAction
{
    public $section;
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
        /**
         * @var StaticPage $model
         */
        $model = StaticPage::model()->findByPk(array(
                'section' => $this->section,
                'key' => $this->key)
        );
        if ($model === null) {
            $model = new StaticPage();
            $model->key = $this->key;
            $model->section = $this->section;
            $model->setDataAttributes(array());
        }
        $dataModel = new DataModel($this->model);

        $dataModel->setAttributes($model->getDataAttributes(), false);
        if (isset($_POST['DataModel']) || isset($_POST['StaticPage'])) {
            if (isset($_POST['StaticPage']))
                $model->setAttributes($_POST['StaticPage']);
            if (isset($_POST['DataModel']))
                $dataModel->setAttributes($_POST['DataModel']);
            if ($model->validate() && $dataModel->validate()) {
                $model->setDataAttributes($dataModel->getAttributes());
                if ($model->save(false)) {
                    //redirect to index
                    if (isset($this->redirectUrl)) {
                        $this->getController()->redirect($this->redirectUrl);
                    }
                }
            }

        }
        //render

        $content = $this->renderForm($model, $dataModel, true);
        if (isset($this->view)) {
            $this->getController()->render($this->view, array('content' => $content));
        } else {
            $this->getController()->renderText($content);
        }
    }

    /**
     * @param StaticPage $model
     * @param DataModel $dataModel
     * @param bool $processOutput
     * @return null|string
     */
    private function renderForm($model, $dataModel, $processOutput = false)
    {
        $out = null;
        if ($processOutput) {
            ob_start();
        }
        $form = $this->getController()->beginWidget('BHorizontalForm', array());

        $formConfig = array(
            array(
                'type' => 'fieldset',
                'legend' => 'Параметры',
                'config' => array(
                    array(
                        'type' => 'simpleInput',
                        'name' => 'textField',
                        'attribute' => 'name',
                        'options' => array('class' => 'input-xxlarge'),
                    ),
                    //  array(
                    //      'type' => 'simpleInput',
                    //      'name' => 'textField',
                    //      'attribute' => 'link',
                    //      'options' => array('class' => 'input-xxlarge'),
                    //  ),
                ),
            ),
        );
        if (!empty($this->form))
            $formConfig[] = array(
                'type' => 'fieldset',
                'legend' => 'Содержимое',
                'config' => array(
                    array(
                        'type' => 'widget',
                        'class' => 'FormGenerator',
                        'config' => array(
                            'form' => $form,
                            'model' => $dataModel,
                            'config' => $this->form,
                        ),
                    )
                ),
            );
        $formConfig[] = array(
            'type' => 'fieldset',
            'legend' => 'Параметры для поисковой оптимизации',
            'config' => array(
                array(
                    'type' => 'simpleInput',
                    'name' => 'textField',
                    'attribute' => 'title',
                    'options' => array('class' => 'input-xxlarge'),
                ),
                array(
                    'type' => 'simpleInput',
                    'name' => 'textArea',
                    'attribute' => 'description',
                    'options' => array('class' => 'input-xxlarge'),
                ),
                array(
                    'type' => 'simpleInput',
                    'name' => 'textArea',
                    'attribute' => 'keywords',
                    'options' => array('class' => 'input-xxlarge'),
                ),

                //'last_change',
                //'priority',
                //'change_freq',
            ),
        );
        $this->getController()->widget('FormGenerator', array(
            'form' => $form,
            'model' => $model,
            'config' => $formConfig,
        ));

        echo '<div class="form-actions"><button type="submit" class="btn btn-large btn-primary">',
        $this->submitLabel,
        '</button></div>';
        if ($processOutput) {
            $out = ob_get_clean();
        }
        return $out;
    }
}