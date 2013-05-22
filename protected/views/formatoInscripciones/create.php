<style>
<!--
.tituloAdmisiones {
	background-color: #ccc;
	margin:0;
	padding:5px;
	font-size:12px;
	font-weight: bold;
}
.miForm input{
	padding:0;
}
-->
</style>

<h2>Formato de Inscripciones</h2>
<?php echo $this->renderPartial('_form', array('model'=>$model),false); ?>