<?php

class EntradasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','admin','create','delete','update','abrirArchivo'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Actualizar','ActualizarImagenPrincipal','CargarNuevoArchivo','EliminarArchivo','abrirArchivo'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){
		$model=new Entradas;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Entradas'])) {
			$model->attributes=$_POST['Entradas'];
			$model->upload_file=CUploadedFile::getInstance($model,'upload_file');
			if($model->save()){
				if(isset($_POST['Entradas']['slider']) && !empty($_POST['Entradas']['slider'])) {
					$sliderId=$_POST['Entradas']['slider'];
					$entradaSlider=new EntradasSliders;
					$entradaSlider->entrada_id=$model->id;
					$entradaSlider->slider_id=$sliderId;
					$entradaSlider->save();
				}
				if($model->upload_file){
					$newname = 'FILE_' .uniqid(). $model->upload_file;
					if($model->upload_file->saveAs('images/downloads/'.$newname)){
						$archivo=new Archivos;
						$archivo->nombre=$newname;
						if($archivo->save()){
							$entradaArchivo=new EntradasArchivos;
							$entradaArchivo->entrada_id=$model->id;
							$entradaArchivo->archivo_id=$archivo->id;
							$entradaArchivo->save();							
						}
					}
				}
				$this->redirect(array('create'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionEliminarArchivo($id){
		// we only allow deletion via POST request
		$entradaArchivo=EntradasArchivos::model()->findByPk($id);
		$archivoId=$entradaArchivo->archivo_id;
		unlink('images/downloads/'.$entradaArchivo->archivo->nombre);
		$entradaArchivo->delete();
		Archivos::model()->deleteByPk($archivoId);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			$this->redirect(Yii::app()->request->urlReferrer);
	}
	
	public function actionCargarNuevoArchivo($id){
		$model=$this->loadModel($id);
		if(isset($_POST['Entradas'])) {
			$model->upload_file=CUploadedFile::getInstance($model,'upload_file');
			if($model->upload_file){
				$newname = 'FILE_' .uniqid(). $model->upload_file;
				if($model->upload_file->saveAs('images/downloads/'.$newname)){
					$archivo=new Archivos;
					$archivo->nombre=$newname;
					if($archivo->save()){
						$entradaArchivo=new EntradasArchivos;
						$entradaArchivo->entrada_id=$model->id;
						$entradaArchivo->archivo_id=$archivo->id;
						$entradaArchivo->titulo=$_POST['Entradas']['titulo'];
                                                $entradaArchivo->save();
                                                Yii::app()->user->setFlash( 'upload-success', 'El archivo se ha cargado exitosamente.' );
					}
				}
                                else
                                    Yii::app()->user->setFlash( 'upload-failure', 'Ha sucedido un problema al cargar el archivo, por favor intente mas tarde.' );
			}
			$this->redirect(Yii::app()->request->urlReferrer);
			
		}
		$this->render('create',array(
				'model'=>$model,
		));
	}
        
	public function actionabrirArchivo($id){
		$this->render('abrirArchivo',array('id'=>$id));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Entradas']))
		{
			$model->attributes=$_POST['Entradas'];
			$model->upload_file=CUploadedFile::getInstance($model,'upload_file');
			if($model->save()){
//				EntradasSliders::model()->deleteAllByAttributes(array('entrada_id'=>$model->id));
				if(isset($_POST['Entradas']['slider']) && !empty($_POST['Entradas']['slider'])) {
					$sliderId=$_POST['Entradas']['slider'];
					$entradaSlider=EntradasSliders::model()->findByAttributes(array('entrada_id'=>$model->id));
					if(!$entradaSlider) {
						$entradaSlider=new EntradasSliders;
						$entradaSlider->entrada_id=$model->id;
						$entradaSlider->slider_id=$sliderId;
						$entradaSlider->save();
					}
				}
				if($model->upload_file){
					$entradaArchivo=EntradasArchivos::model()->findByAttributes(array('entrada_id'=>$model->id));
					$archivo=null;
					if(!$entradaArchivo) {
						$entradaArchivo=new EntradasArchivos;
						$archivo=new Archivos;
						$newname = 'FILE_' .uniqid(). $model->upload_file;
					}
					else {
						$archivo=Archivos::model()->findByPk($entradaArchivo->archivo_id);
						$newname = $archivo->nombre;
					}
					
					
					if($model->upload_file->saveAs('images/downloads/'.$newname)){
						$archivo->nombre=$newname;
						if($archivo->save()){
							$entradaArchivo->entrada_id=$model->id;
							$entradaArchivo->archivo_id=$archivo->id;
							$entradaArchivo->save();
						}
					}
				}				
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionActualizar(){
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=Entradas::model()->findByPk($_POST['pk']);
			$model->informacion=$_POST['value'];
			$model->save();
		}
	}

	public function actionActualizarImagenPrincipal () {
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=Entradas::model()->findByPk($_POST['pk']);
			$model->gallery_photo_id=$_POST['value'];
			$model->save(false);
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$entrada=$this->loadModel($id);
			EntradasSliders::model()->deleteAllByAttributes(array('entrada_id'=>$entrada->id));
			EntradasArchivos::model()->deleteAllByAttributes(array('entrada_id'=>$entrada->id));
			
			$entrada->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Entradas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Entradas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Entradas']))
			$model->attributes=$_GET['Entradas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Entradas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='entradas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}