// JavaScript Document

	var dato1 = document.getElementById("dato1Resta");
	var dato2 = document.getElementById("dato2Resta");
	var resultadoCorrecto;
	

function llenarResta(){        //Esto se carga en el onLoad() de resta.html	
	dato1 = Math.floor((Math.random()*10)+1);
	dato2 = Math.floor((Math.random()*10)+1);
	document.getElementById("dato1Resta").innerHTML=dato1;
	document.getElementById("dato2Resta").innerHTML=dato2;
	}


function resta(){				//esta funcion se llama cuando presionamos el boton result
	var numIngresado = document.getElementById("resultresta").value;
	resultadoCorrecto = dato1 - dato2;
	if(numIngresado!=""){
		
		if(resultadoCorrecto == numIngresado){
			alert("You're right, the answer is "+numIngresado+ "\n. Congrats!");
			document.getElementById("resultresta").value="";
			llenarSuma();
			}
			else{
				alert("You failed for very little :(\ntry again :)");
				}	
		}	
	}