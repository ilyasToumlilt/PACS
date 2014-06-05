function notes(form) {
   var valide = true;
   var index = 0;
   var qs = "";
   for (var key in form.elements) {
      index++;
      var v = form.elements[key];
      if (v.tagName === "INPUT" && v.type === "text") {
	 if (!/^([01]?[0-9]([.](25|50|75))?|20)$/.test(v.value)) {
	    valide = false;
	    v.style.border = "2px solid red";
	 } else {
	    v.style.border = "1px solid black";
	 }
	 if (valide) {
	    qs += v.name + "=" + v.value + "&";
	 }
      }
   }
   if (valide) {
      ajax("entrer_notes.php?" + qs, "", moyenne);
   }
   return false;
}