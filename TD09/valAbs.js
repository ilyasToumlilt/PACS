// Question 1 :
function valabs(n) {
   var re_r = /^([\+\-]?[1-9][0-9]*|0)$/;
   if (re_r.test(n))
      return (n >= 0) ? (n + 0) : (0 - n);
   return 0;
}

// Question 2 :
function is_num(val) {
   var res = /^(0|(\+|\-)?\s*[1-9]+[0-9]*(\.[0-9]+)?)$/.test(val);
   return (res) ? Number(val) : false;
}