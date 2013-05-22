<?php
$randomId=uniqid();
$menuArea=Menus::model()->findByPk($menuId);
echo CHtml::image($menuArea->galleryPhoto->getUrl(),'',array('usemap'=>'#menuArea'.$menuArea->id));

$areasSensibles=MenusAreasSensibles::model()->findAllByAttributes(array('menu_id'=>$menuArea->id));
if ( $areasSensibles ) {
	echo CHtml::tag('map',array('name'=>'menuArea'.$menuArea->id, 'id'=>'menuArea'.$menuArea->id),false,false);
	foreach ($areasSensibles as $areaSensible) {
		$url='site/GetEntradasSeccion';
		$params=array('areaSensibleId'=>$areaSensible->id);

		$categoria=Categorias::model()->findByAttributes(array('menu_area_sensible_id'=>$areaSensible->id));
		if($categoria) {
			$vistaEspecial=$categoria->vista_especial;
			if($vistaEspecial){
				if($vistaEspecial==4){
					$url='site/ContactoIntercambios';
					$params=array();
				}
				if($vistaEspecial==5){
					$url='site/ContactoIntercambios2';
					$params=array();
				}
			}
		}

		echo CHtml::tag('area',
				array(
						'shape'=>'rect',
						'coords'=> $areaSensible->x1.','.$areaSensible->y1.','.$areaSensible->x2.','.$areaSensible->y2,
						'id'=>'areaSensible'.$areaSensible->id.$randomId,
						'href'=>$this->CreateUrl($url,$params)
				)
		);
	}
	echo CHtml::closeTag('map');
}
?>