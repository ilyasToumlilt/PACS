function moyenne(request) {
   if (request.readyState === 4) {
      document.getElementById('moyenne').replaceChild(
	      document.createTextNode('Moyenne : ' + request.responseText),
	      document.getElementById('moyenne').firstChild);
      document.getElementById('moyenne').style.display = "block";
      document.getElementById('label-groupe').style.color = "black";
      document.getElementById('f2').style.display = "none";
   }
}