<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',  
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
    
    public function actionTwoColumns() {
        $this->layout = 'column2';
        
        $this->render('twoColumns');
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error) {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate()){
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->renderPartial('contact',array('model'=>$model));
	}

	public function actionContacto() {
		$model=new Contacto;
		$seccionId=null;
		if(isset($_GET['seccionId']))$seccionId=$_GET['seccionId'];
                $seccion = Secciones::model()->findByPk( $seccionId );
                $portada = $seccion->portada;
                if(isset($_POST['Contacto'])){
			$model->attributes=$_POST['Contacto'];
			$model->fecha_contacto=date('Y-m-d');
			if($model->save()){
                                $email = $seccion->id == 8 ?
                                            Yii::app()->params['estrellasAdminEmail'] : 
                                            Yii::app()->params['sanPedroAdminEmail'];
                                SiteController::EnviarEmail($model->asunto, $model->comentario, $email);
				Yii::app()->user->setFlash('success','Gracias por contactarnos. Le responderemos lo mas pronto posible.');
                                
				//$this->redirect(array('site/Index','portadaId'=>$portada->id));
			}
		}
		$this->render('formularioContacto',array('model'=>$model,'seccionId'=>$seccionId));
	}
	public function actionContactoIntercambios() {
		$model=new Contacto;
		if(isset($_POST['Contacto'])){
			$model->attributes=$_POST['Contacto'];
			$model->fecha_contacto=date('Y-m-d');
			if($model->save()){
				$this->redirect(array('site/Index','portadaId'=>2));
			}
		}
		$this->render('formularioContactoIntercambios',array('model'=>$model));
	}
	public function actionContactoIntercambios2() {
		$model=new Contacto;
		if(isset($_POST['Contacto'])){
			$model->attributes=$_POST['Contacto'];
			$model->fecha_contacto=date('Y-m-d');
			if($model->save()){
				$this->redirect(array('site/Index','portadaId'=>2));
			}
		}
		$this->render('formularioContactoIntercambios2',array('model'=>$model));
	}	
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionBotonRegresar() {
		$this->renderPartial('BotonRegresar',null,false,true);
	}
	public function actionRegresar() {
		if(isset($_POST['action'])){
			$accion=$_POST['action'];
			if($accion=='home'){
				$this->renderPartial('home',null,false,true);
			}
		}
	}
	public function actionGetEntradasSeccion(){
		if(isset($_GET['areaSensibleId']) or isset($_GET['seccionId'])) {
			if(isset($_GET['areaSensibleId']))
				$categoria=Categorias::model()->findByAttributes(array('menu_area_sensible_id'=>$_GET['areaSensibleId']));
			elseif(isset($_GET['seccionId']))
				$categoria=Categorias::model()->findByAttributes(array('seccion_id'=>$_GET['seccionId']));
			if($categoria){
                            
				if($categoria->vista_especial) {
					if($categoria->vista_especial==1) {
						$this->render('Ubicacion',null,false);
					}
					if($categoria->vista_especial==6) {
						$this->redirect(array('site/GetContenidoSeccion&seccionId=2','getModal'=>'1'));
					}
				}
				else {
					$entradaPrincipal=Entradas::model()->findByAttributes(array('categoria_id'=>$categoria->id),'entrada_antecesor_id IS NULL');
					if($entradaPrincipal){
						$backmenu=null;
						if(isset($_GET['backmenu'])) {
							$backmenu=$_GET['backmenu'];
						}
						$this->render('categoriaInfo',array('entradaId'=>$entradaPrincipal->id,'categoriaId'=>$categoria->id, 'backmenu'=>$backmenu),false,true);
					}
				}
			}
		}
	}
	public function actionGetEntradas() {
		if(isset($_GET['entradaId']) && isset($_GET['categoriaId'])) {
			$entrada=Entradas::model()->findByPk($_GET['entradaId']);
			if($entrada){
				$this->render('categoriaInfo',array('entradaId'=>$_GET['entradaId'],'categoriaId'=>$_GET['categoriaId']),false,true);
			}
		}
	}
	public function actionGetUbicacion() {
		if(isset($_GET['clave']) && $_GET['clave']=='UBICACION') {
			$this->render('Ubicacion',null,false);
		}
	}
	public function actionGetSlider() {
		if(isset($_POST['galeriaId'])){
			$this->renderPartial('getSlider',array('entradaId'=>$_POST['entradaId'], 'galeriaId'=>$_POST['galeriaId'], 'portadaId'=>$_POST['portadaId']),false,true);			
		}
	}
        public function actionGetSliderPorClave() {
		if(isset($_POST['galeriaId']) && isset($_POST['clave'])){
			$this->renderPartial('getSliderPorClave',array('clave'=>$_POST['clave'], 'galeriaId'=>$_POST['galeriaId'], 'portadaId'=>$_POST['portadaId']),false,true);			
		}
	}
	public function actionGetNuevoSlider() {
		if ( isset($_GET['sliderId']) ) {
			$this->renderPartial('getNuevoSlider',array('sliderId'=>$_GET['sliderId']),false,true);
		}
	}
	public function actionReestructuraDivInfo() {
		$this->renderPartial('ReestructuraDivInfo',null,false,true);
	}
	public function actionMenuQuienesSomos () {
		$this->renderPartial('menuQuienesSomos',null,false,true);
	}
	public function actionMenuQuienesSomos2 () {
		$this->render('menuQuienesSomos',null,false);
	}
	public function actionMenuAdmisiones() {
		$this->render('menuAdmisiones',null,false);
	}
	public function actionGetFormularios () {
		if(isset($_POST['form'])) {
			$formularioId=$_POST['form'];
			if($formularioId==1) {
				$this->renderPartial('formFichaDeInscripcion',null,false,true);
			}
		}
	}
	public function actionDownload(){
		if(isset($_GET['file'])) {
			$file = $_GET['file'];
			return Yii::app()->getRequest()->sendFile($file, @file_get_contents('..'.Yii::app()->request->baseUrl.'/images/downloads/'.$file));
		}
	}
	public function actionGetUrlImagen() {
		if ( isset($_GET['id']) ) {
			echo GalleryPhoto::model()->findByPk($_GET['id'])->getUrl();
		}
	}
	public function actionGetMenuSeccionesBotones() {
		if ( isset($_POST['portadaId']) ) {
			$seccionId=null;
			if(isset($_POST['seccionId']))$seccionId=$_POST['seccionId'];
			Yii::app ()->clientScript->scriptMap ['jquery.js'] = false;
			$this->renderPartial('menuSeccionesBotones',array('portadaId'=>$_POST['portadaId'],'seccionId'=>$seccionId),false,true);
		}
	}
	public function actionGetContenidoSeccion () {
		if(isset($_GET['seccionId'])){
			$this->render('menuSeccion',array('seccionId'=>$_GET['seccionId']));
		}
	}
	public function actionActualizarImagenBotonMenu () {
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=Secciones::model()->findByPk($_POST['pk']);
			$model->imagen_boton_id=$_POST['value'];
			$model->save();
		}
	}
	public function actionActualizarDatosDeUbicacion() {
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=InformacionConstante::model()->findByPk($_POST['pk']);
			$model->datos_de_ubicacion=$_POST['value'];
			$model->save();
		}
	}
	public function actionActualizarPoliticasDePrivacidad(){
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=InformacionConstante::model()->findByPk($_POST['pk']);
			$model->politicas_de_privacidad=$_POST['value'];
			$model->save();
		}
	}
	public function actionActualizarImagenBotonActivoMenu () {
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=Secciones::model()->findByPk($_POST['pk']);
			$model->imagen_boton_activo_id=$_POST['value'];
			$model->save(false);
		}
	}
	public function actionActualizarFechaInicioImagen () {
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=GalleryPhoto::model()->findByPk($_POST['pk']);
			$model->fecha_inicio=$_POST['value'];
			$model->save();
		}
	}
	public function actionActualizarFechaFinImagen () {
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=GalleryPhoto::model()->findByPk($_POST['pk']);
			$model->fecha_fin=$_POST['value'];
			$model->save();
		}
	}
	public function actionActualizarSlider() {
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=IndexSliders::model()->findByPk($_POST['pk']);
			$model->slider_id=$_POST['value'];
			$model->save();
		}
	}
	public function actionGetMenuSeccionesEscolares($clave=null){
		$this->renderPartial('menuSeccionesEscolares',array('clave'=>$clave));
	}
	public function actionGetEntradasPorCategoria() {
		if( isset($_GET['clave']) ) {
			$categoria=Categorias::model()->findByAttributes(array('clave'=>$_GET['clave']));
			if($categoria){
				$entradaPrincipal=Entradas::model()->findByAttributes(array('categoria_id'=>$categoria->id),'entrada_antecesor_id IS NULL');
				if($entradaPrincipal){
					$backmenu=null;
					if(isset($_GET['backmenu'])) {
						$backmenu=$_GET['backmenu'];
					}
					$this->render('categoriaInfo',array('clave'=>$_GET['clave'], 'portadaId'=>1,'entradaId'=>$entradaPrincipal->id,'categoriaId'=>$categoria->id, 'backmenu'=>$backmenu),false,true);
				}
			}			
		}
	}
	public function actionGetFormularioExAlumnos() {
		$model=new Usuarios;		
		$model->scenario = 'registerwcaptcha';
		if(isset($_POST['Usuarios'])){
			$model->attributes=$_POST['Usuarios'];
			$model->nombre_de_usuario='exaimex';
			$model->password=md5('exaimex');
			if($model->validate()) {
				$model->scenario =NULL;
				if($model->save()){
					Yii::app()->user->setFlash('success', '<strong>Envío de Datos Satisfactorio!</strong> Se han enviado sus datos de manera exitosa.');
					
					$this->redirect(array('site/Index'));
				}
			}
		}
		$this->render('formularioExAlumnos',array(
				'model'=>$model, 'seccionId'=>$_GET['seccionId']
		));		
	}
	public function actionGetBotonesCampus() {
		$this->renderPartial('botonesCampus',array('portada_Id'=>$_POST['portada_Id']),false,true);
	}
	public function actionEditFechas() {
			$id=$_GET['photoId'];
			$model= GalleryPhoto::model()->findByPk($id);	
			if(isset($_POST['GalleryPhoto'])){
				$model->fecha_inicio=$_POST['GalleryPhoto']['fecha_inicio'];
				$model->fecha_fin=$_POST['GalleryPhoto']['fecha_fin'];
				if($model->save()){
					$this->redirect(array('sliders/GetGaleria','id'=>$model->gallery->id));
					//echo "fi:".$_POST['GalleryPhoto']['fecha_inicio'];
				}
			}			
			$this->render('editFechas',array(
					'model'=>$model,
			));
		
	}
	public function actionGetPoliticasDePrivacidad(){
		$this->render('politicasDePrivacidad');
	}
	public function actionGetVistaDeImpresion () {
		$this->render('VistaDeImpresion',array('entradaId'=>$_GET['entradaId']));
	}
	public function actionActualizarImagenDeMenu(){
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=Menus::model()->findByPk($_POST['pk']);
			$model->gallery_photo_id=$_POST['value'];
			$model->save();
		}		
	}
	public function actionGetNuevaImagenDeMenu(){
		if( isset($_GET['menuId']) ){
			$this->renderPartial('nuevaImagenDeMenu',array('menuId'=>$_GET['menuId']),false,true);
		}
	}
	public function actionGetTitulosPortada(){
		if( isset($_POST['portadaId']) ){
			$this->renderPartial('titulosPortada',array('portadaId'=>$_POST['portadaId']),false,true);
		}
	}	
	public function actionActualizarTituloPortada(){
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=Portadas::model()->findByPk($_POST['pk']);
			$model->gallery_photo_id=$_POST['value'];
			$model->save();
		}
	}
	public function actionActualizarBotonPortada(){
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=Portadas::model()->findByPk($_POST['pk']);
			$model->boton_id=$_POST['value'];
			$model->save();
		}
	}
	public function actionActualizarBotonActivoPortada(){
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=Portadas::model()->findByPk($_POST['pk']);
			$model->boton_activo_id=$_POST['value'];
			$model->save();
		}		
	}
	public function actionActualizarSliderEntrada() {
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=EntradasSliders::model()->findByPk($_POST['pk']);
			$model->slider_id=$_POST['value'];
			$model->save();
		}
	}
	public function actionActualizarFondoEntrada() {
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=Entradas::model()->findByPk($_POST['pk']);
			$model->fondo_entrada_id=$_POST['value'];
			$model->save();
		}
	}
	public function actionActualizarBotonConstante(){
		if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=BotonesConstantes::model()->findByPk($_POST['pk']);
		//	$model->gallery_photo_id=$_POST['value'];
                        $model->$_POST['name']=$_POST['value'];
			$model->save();
		}
	}
        public function actionActualizarBotonConstanteActivo(){
                if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
			$model=BotonesConstantes::model()->findByPk($_POST['pk']);
			$model->gallery_photo_activo_id=$_POST['value'];
			$model->save();
		}
        }
	public function actionGetDialogInformacion(){
		$model=Entradas::model()->findByPk($_GET['entradaId']);
		if(isset($_POST['Entradas']))
		{
			$model->attributes=$_POST['Entradas'];
			$model->informacion=$_POST['Entradas']['informacion'];
			if($model->save(false)){
				$this->redirect(array('site/Index'));
			}
		}
				
		$this->render('dialogInformacion',array('entradaId'=>$_GET['entradaId']));

	}
        
	public function actionComunidadImex() {
		$model=new Usuarios();
                if(isset( $_GET['portadaId'] ) && !empty( $_GET['portadaId'] ) && $_GET['portadaId'] != 1 ){ 
                        $this->redirect( 'http://www.modeloeducativosimex.com/demointranet'.( $_GET['portadaId'] == 3 ? 'sp' : '' ) );
                }
		$model->scenario = 'registerwcaptcha';
		if(isset($_POST['selectCampus'])) {
//			if($model->validate()){
				$campusId=$_POST['selectCampus'];
				$model->scenario=null;
				if($campusId==2){
					$this->redirect( 'http://www.modeloeducativosimex.com/demointranet' );
				}
				elseif($campusId==3) {
					$this->redirect( 'http://www.modeloeducativosimex.com/demointranetsp' );
				}
//			}
		}
		$this->render('loginComunidadImex',array('portadaId'=>$_GET['portadaId'],'model'=>$model));
	}
	public function actionGetGaleria() {
		if ( isset ($_POST['selectorGaleria']) ){
			$this->renderPartial('GetGaleriaParaEditor',array('galeriaId'=>$_POST['selectorGaleria'],false,true));
		}
	}
	public function actionGetGalerias(){
		if ( isset($_POST['galeriaId']) ) {
			$this->renderPartial('galeriaParaModal',array('galeriaId'=>$_POST['galeriaId'],'divDestino'=>$_POST['divDestino'], 'tipoRetorno'=>$_POST['tipoRetorno'], 'identificador'=>$_POST['identificador'], 'entradaId'=>$_POST['entradaId'] ),false,true);
		}
	}
	public function actionSetImagen(){
		$status='failure';
		if ( isset ( $_POST['identificador'] ) ){
			$identificador=$_POST['identificador'];
			if($identificador==1) {
				$entrada=Entradas::model()->findByPk($_POST['entradaId']);
				$entrada->fondo_entrada_id=$_POST['imagenId'];
				if($entrada->save())
					$status='ok';
			}
		}
		echo $status;
	}
        
        public static function EnviarEmail($asunto, $mensaje, $emails) {
            $message = new YiiMailMessage;
            $message->subject = $asunto;
            $message->setBody($mensaje);

            foreach (is_array( $emails ) ? $emails : array( $emails ) as $email) {
                $message->addTo($email);
            }
            $message->from = Yii::app()->params['adminEmail'];

            Yii::app()->mail->send($message);
        }
        
}