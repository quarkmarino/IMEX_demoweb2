<?php
if(isset($id)){
	$archivo = Archivos::model()->findByPk($id);
	if($archivo){
		$newcontent='<iframe scrolling="auto" style="width:850px; height:600px;border: none;" frameborder="0" src="https://docs.google.com/viewer?url='.Yii::app()->request->getBaseUrl(true).'/images/downloads/'.$archivo->nombre.'&embedded=true"></iframe>';
		echo $newcontent;		
	}
	
}