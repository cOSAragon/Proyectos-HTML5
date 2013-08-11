// JavaScript Document

	var dato1 = document.getElementById("dato1Divide");
	var dato2 = document.getElementById("dato2Divide");
	var resultadoCorrecto;
	

function llenarDivision(){        //Esto se carga en el onLoad() de resta.html	
	dato1 = Math.floor((Math.random()*10)+1);
	dato2 = Math.floor((Math.random()*10)+1);
	document.getElementById("dato1Divide").innerHTML=dato1;
	document.getElementById("dato2Divide").innerHTML=dato2;
	console.log("dato uno "+dato1+" dato 2 "+dato2);
	}


function division(){				//esta funcion se llama cuando presionamos el boton result
	var numIngresado = document.getElementById("resultdivide").value;
	resultadoCorrecto = dato1 / dato2;
	
	console.log("resultadoingresado" +numIngresado);
	console.log(dato1);
	console.log(dato2);
	
	if(numIngresado!=""){
		
		if(resultadoCorrecto == numIngresado){
			alert("You're right, the answer is "+numIngresado+ "\n. Congrats!");
			llenarSuma();
			document.getElementById("resultdivide").value="";
			}
			else{
				alert("You failed for very little :(\ntry again :)");
				}	
		}	
	}// JavaScript Document