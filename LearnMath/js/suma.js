// JavaScript Document

	var dato1 = document.getElementById("dato1Suma");
	var dato2 = document.getElementById("dato2suma");
	var resultadoCorrecto;
	

function llenarSuma(){        //Esto se carga en el onLoad() de suma.html	
	dato1 = Math.floor((Math.random()*10)+1);
	dato2 = Math.floor((Math.random()*10)+1);
	document.getElementById("dato1Suma").innerHTML=dato1;
	document.getElementById("dato2suma").innerHTML=dato2;
	console.log("dato uno "+dato1+" dato 2 "+dato2);
	}


function suma(){				//esta funcion se llama cuando presionamos el boton result
	var numIngresado = document.getElementById("resultsuma").value;
	resultadoCorrecto = dato1 + dato2;
	
	console.log("resultadoingresado" +numIngresado);
	console.log(dato1);
	console.log(dato2);
	
	if(numIngresado!=""){
		
		if(resultadoCorrecto == numIngresado){
			alert("You're right, the answer is "+numIngresado+ "\n. Congrats!");
			document.getElementById("resultsuma").value="";
			llenarSuma();
			}
			else{
				alert("You failed for very little :(\ntry again :)");
				}	
		}
		else 
		alert("introduce un dato");	
	}