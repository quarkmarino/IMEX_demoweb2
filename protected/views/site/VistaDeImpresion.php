<?php
     $this->widget('ext.mPrint.mPrint', array(
          'title' => 'Vista de Impresión',          //the title of the document. Defaults to the HTML title
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
	$entrada=Entradas::model()->findByPk($entradaId);
?>
<div style="width:505px;">
	<?php 
		echo $entrada->informacion;
	?>
</div>