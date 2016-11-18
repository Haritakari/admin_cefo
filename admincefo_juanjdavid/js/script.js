function myUrl(id) {
    location.href = "http://localhost/cefo_juandavid/index.php/cursos/curs/"+id+"";
}









function mostrar(e){                //para mostrar detalles producto 
	var src=(e.getAttribute("src"))
	var nom=(e.getAttribute("alt"))
	var car=(e.nextElementSibling.innerHTML)
	var pre=(e.nextElementSibling.nextElementSibling.innerHTML)
	var id=(e.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML)
	
	document.getElementsByTagName('body')[0].innerHTML+=
	'<div id="borr">'+
		'<div id="in">'+
			'<img src="http://localhost/projectcodeiboo/images/x.png" onclick="cerrar();" class="butt"/><br/><br/>'+
			'<p>'+nom+'</p>'+	
			'<div class="flexinit">'+
				'<figure class="flex"><img src="'+src+'" alt="'+nom+'"/></figure><br/><br/>'+
				'<div class="flex">'+
					'<p>'+car+'</p>'+
					'<br/>'+
					'<p id="pre">   '+pre+' €</p>'+
					'<p>   '+id+' </p>'+
					'<form action="" method="post"/>'+
					'<input type="hidden" name="id" value="'+id+'"/>'+
					'<input type="hidden" name="pre" value="'+pre+'"/>'+
					'<input type="hidden" name="foto" value="'+src+'"/>'+
					'<input type="hidden" name="nom" value="'+nom+'"/>'+
					'<p> <input class="butadd" value="add" name="add" type="submit"/></p>'+
					'</form>'+
				'</div>'+
			'</div>'+
		'</div>'+
	'</div>';
}
function cerrar(){										//cierra ventana
	var div=document.querySelector("#borr");
	div.parentNode.removeChild(div);
}
function change(){										//ver o no ver la direccion de envio alternativa
	var hidd=document.querySelectorAll('.rev')
	for(var i=0; i<=hidd.length; i++){
		if(hidd[i].className=='rev hidd'){
			hidd[i].className='rev disp'
		}
		else{
			hidd[i].className='rev hidd'
		}	
	}
}
function mosrar(e){                //para mostrar detalles producto a gente sin registrar (capado en php por si se lo saltan)
	var src=(e.getAttribute("src"))
	var nom=(e.getAttribute("alt"))
	var car=(e.nextElementSibling.innerHTML)
	var pre=(e.nextElementSibling.nextElementSibling.innerHTML)
	var id=(e.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML)
	
	document.getElementsByTagName('body')[0].innerHTML+=
	'<div id="borr">'+
		'<div id="in">'+
		'<img src="http://localhost/projectcodeiboo/images/x.png" onclick="cerrar();" class="butt"/><br/><br/>'+
			'<p>'+nom+'</p>'+	
			'<div class="flexinit">'+
				'<figure><img src="'+src+'" alt="'+nom+'"/></figure><br/><br/>'+
				'<div class="flex">'+
					'<p>'+car+'</p>'+
					'<br/>'+
					'<p>   '+pre+' €</p>'+
					'<p>   '+id+' </p>'+
					'<p> <a class="butadd" href="http://localhost/projectcodeiboo/index.php/usuario/registro">Registrate</a></p>'+
				'</div>'+
			'</div>'+
		'</div>'+
	'</div>';
}
