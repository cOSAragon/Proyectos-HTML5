// JavaScript Document

	var dato1 = document.getElementById("dato1Multi");
	var dato2 = document.getElementById("dato2Multi");
	var resultadoCorrecto;
	

function llenarMultiplicacion(){        //Esto se carga en el onLoad() de resta.html	
	dato1 = Math.floor((Math.random()*10)+1);
	dato2 = Math.floor((Math.random()*10)+1);
	document.getElementById("dato1Multi").innerHTML=dato1;
	document.getElementById("dato2Multi").innerHTML=dato2;
	}


function multiplicacion(){				//esta funcion se llama cuando presionamos el boton result
	var numIngresado = document.getElementById("resultmulti").value;
	resultadoCorrecto = dato1 * dato2;
	if(numIngresado!=""){
		
		if(resultadoCorrecto == numIngresado){
			alert("You're right, the answer is "+numIngresado+ "\n. Congrats!");
			llenarSuma();
			}
			else{
				alert("You failed for very little :(\ntry again :)");
				}	
		}	
	}// JavaScript Document