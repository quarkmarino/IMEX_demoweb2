<?php

class DefaultController extends AdminController
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('error', 'login'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('index', 'logout', 'changePassword'),
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public $defaultAction = 'index';

    public function actionIndex()
    {
        // $this->layout = 'base';
        // $this->render('index');
        $this->redirect(array('/admin/staticPage/web'));
    }

    public function actionChangePassword()
    {

        $model = new ChangePasswordForm();
        if (isset($_POST['ChangePasswordForm'])) {
            $model->setAttributes($_POST['ChangePasswordForm']);
            if ($model->validate() && $model->changePassword()) {
                $this->redirect(array('default/index'));
            }
        }
        $this->layout = 'base';
        $this->render('changePassword', array('model' => $model));
    }

    public function actionError()
    {
        $this->layout = 'error';
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }


    public function actionLogin()
    {
        /**
         * @var LoginForm $model
         */
        $model = new LoginForm();

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->setAttributes($_POST['LoginForm']);
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        $this->layout = 'main';
        $this->render('login', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect($this->createUrl('default/index'));
    }
}