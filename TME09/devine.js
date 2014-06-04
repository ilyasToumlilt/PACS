// Voir devine2.html pour le test.

nbadeviner = 0;
delai = 10000;

function init() {
   nbadeviner = Math.floor(Math.random() * 10) + 1;
   d = setTimeout("termine()", delai);
}

function isNumeric(n) {
   return !isNaN(parseFloat(n)) && isFinite(n);
}

function controle(inp) {
   var str = (!isNumeric(inp.value)) ? "Farceur" :
	   (parseInt(inp.value) === nbadeviner) ? "gagné" :
	   (parseInt(inp.value) < nbadeviner) ? "C'est moins" : "C'est plus";
   if ( parseInt(inp.value) === nbadeviner )
      clearTimeout(d);
   alert(str);
}

function termine(){
   if ( window.confirm("Delai expiré, recommencer ?") ){
      init();
   }
}