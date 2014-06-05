function verifier_td10 ( request ){
   if ( request.readyState === 4 ){
      if ( request.statuts === 204 ){
	 document.getElementById('label-groupe').style.color='red';
	 document.title += " Erreur";
      } else if ( request.status !== 200 ) {
	 alert("status " + request.status );
      } else {
	 document.getElementById('label-groupe').style.color='green';
	 var match = /^(.*) Erreur/.exec(document.title);
	 if ( match ) {
	    document.title = match[1];
	 }
	 presente_tableau(request.responseText, document.getElementById('u'));
	 document.getElementById('f2').style.display = 'block';
	 u.firstChild.firstChild.nextSibling.focus();
      }
   }
}