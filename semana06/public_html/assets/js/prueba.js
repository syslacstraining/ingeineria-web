
var i;

i=5;
//i="hola";

document.getElementById("hh1").innerHTML="cruel";

if(i==5)
{
	//alert("es cinco");
}

switch(i)
{
	case 1:
		alert(1); break;
	case 5:
		//alert(5); 
		break;
}


for(i=0;i<10;i++)
{	
	document.write("valor "+i);
}



function mostrar(index)
{
	if(index<=0 || index >3)
		return;
	
	document.getElementById("img"+index).style.display="block";
}


function ocultar(index)
{
	if(index<=0 || index >3)
		return;

	document.getElementById("img"+index).style.display="none";
}

var INDEX=0;

function rotar()
{
	INDEX++;	
	
	ocultar(INDEX-1);
	mostrar(INDEX);
}


setInterval(rotar,2000);

