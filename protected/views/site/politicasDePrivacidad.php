<?php
$this->renderPartial('BotonRegresar'); 
?>
<?php
     $this->widget('ext.mPrint.mPrint', array(
          'title' => 'Políticas de Privacidad',          //the title of the document. Defaults to the HTML title
          'tooltip' => 'Imprimir Documento',        //tooltip message of the print icon. Defaults to 'print'
          'text' => 'Imprimir',   //text which will appear beside the print icon. Defaults to NULL
          'element' => '#printDiv',        //the element to be printed.
          'exceptions' => array(       //the element/s which will be ignored
              '#mainmenu',
          ),
          'publishCss' => true,       //publish the CSS for the whole page?
          'id' => 'print-div'         //id of the print link
      ));
?>
<?php
//	echo CHtml::link('imprimir',"#",array('id'=>'print-div')); 
	$datosPoliticas=InformacionConstante::model()->findByPk(1);
?>
<div style="width:505px;" id="printDiv">
<?php

	if(!Yii::app()->user->isGuest && (Yii::app()->user->id==1 || Yii::app()->user->id==4 || Yii::app()->user->id==5 ) ){
		$this->widget('ext.editable.EditableField', array(
				'type' => 'textarea',
				'placement' => 'right',
				'model' => InformacionConstante::model()->findByPk(1),
				'attribute' => 'politicas_de_privacidad',
				'url' => $this->createUrl('site/ActualizarPoliticasDePrivacidad'),
		));
	}
	else {
		echo $datosPoliticas->politicas_de_privacidad;
	}
?>
</div>