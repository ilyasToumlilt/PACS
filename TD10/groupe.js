function groupe_td10( form ){
   var val = form.elements['groupe'].value;
   val = ( /^\d+$/.test(val) ) ? val : 0;
   document.getElementById('u').innerHTML = '';
   document.getElementById('moyenne').style.display = 'none';
   ajax('get_groupe.php?groupe=' + val , '', verifier_td10);
   return false;
}