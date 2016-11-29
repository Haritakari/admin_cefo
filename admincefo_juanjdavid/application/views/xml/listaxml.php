<?php 
	//cambiando la cabecera hacemos que se pueda descargar el fichero xml
	//header('Content-type:text/xml; charset=utf-8');
	//header('Content-Disposition:attachment ; filename=arees_subscripcions.xml');
var_dump($alusubs);
	echo Xml_library::toXML($alusubs);
?>