function createInput(){
        // var c = document.getElementById("Dups");
        //var clon = c.cloneNode("Dups");
        //document.getElementById('arts2').appendChild(clon);
  var texts = document.createElement("textarea");
    texts.id="Dups";
    texts.name="objEstrate";  
    document.getElementById('arts2').appendChild(texts);
}

var A = 0;
var O = 0;
var F = 0;
var D = 0;


function envt(tipo){

   
  var estra =document.createElement("h3");
  var espacio = document.createElement("br");
 
  estra.className="OnEstrat";

  switch(tipo){
    case "F": 
    estra.id="Estrat"+F;
    document.getElementById('FortalezasL').appendChild(estra);
    document.getElementById('FortalezasL').appendChild(espacio);

    var texto = document.getElementById('FortalezasP').value;
    document.getElementById('Estrat'+F).innerHTML = texto;
    F++;
    break;
    case "D":
      estra.id="Estrat"+D;
      document.getElementById('DebilidadesL').appendChild(estra);

    document.getElementById('DebilidadesL').appendChild(espacio);
      var texto = document.getElementById('DebilidadesP').value;
      document.getElementById('Estrat'+D).innerHTML = texto;
      D++;
      break;
    case "A":
      estra.id="Estrat"+A;
      document.getElementById('AmenazasL').appendChild(estra);
      document.getElementById('AmenazasL').appendChild(espacio);
      var texto = document.getElementById('AmenazasP').value;
      document.getElementById('Estrat'+A).innerHTML = texto;
      A++;
      break;
    case "O":
      estra.id="Estrat"+O;
      document.getElementById('OportunidadesL').appendChild(estra);
      document.getElementById('OportunidadesL').appendChild(espacio);
      var texto = document.getElementById('OportunidadesP').value;
      document.getElementById('Estrat'+O).innerHTML = texto;
      O++;
      break;
    default:
        alert("Error");
      break;
  }
  /*

 ;*/
 
}