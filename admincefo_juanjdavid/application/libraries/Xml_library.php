<?php		
class XML_library{	
	
    public static function toXML($l, $root='root', $ns='http://ej.org/xml', $n=''){
    	//creación del DOMDocument
    	$xml = new DOMDocument("1.0", "utf-8");
    	$xml->preserveWhiteSpace = false;
    	$xml->formatOutput = true;
    		
    	//creación del elemento raíz y colocación del atributo namespace
    	$raiz = $xml->createElement($root);
    	$raiz->setAttribute('xmlns', $ns);
    		
    	//para cada objeto en la lista de objetos
    	foreach($l as $objeto){
    		//si no se indicó el nombre del objeto
    		if(empty($n)){
    			//usa el nombre de la clase para crear un nodo XML
    			$clase = strtolower(get_class($objeto));
    			$elemento = $xml->createElement($clase);
    		//en caso contrario
    		}else{ 
    			//usa el nombre indicado para crear un nodo XML
    			$elemento = $xml->createElement($n);
    		}
    
    		//para cada propiedad del objeto actual
    		foreach($objeto as $campo=>$valor){
    			//crea un nodo y añadelo al elemento XML creado
    			$elemento->appendChild($xml->createElement($campo, $valor));
    		}
    		
    		//añade el elemento creado al elemento raiz
    		$raiz->appendChild($elemento);
    	}
    	
    	//añade el nodo raíz al DOMDocument
    	$xml->appendChild($raiz);
    	
    	//retorna el XML creado a modo de texto
    	return $xml->saveXML();
    }
}
?>