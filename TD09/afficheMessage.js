function afficheMessage() {
   d = new Date();
   n = d.getHours();
   if ( n < 12 ){
      return ("<h1>Good morning </h1> il est " + n + " heure");
   } else if ( n < 17 ){
      return ("<h2>Good afternoon </h2> Il est " + n + " heure");
   } else {
      return ("<h3>Good evening</h3> Il est " + n + " heure");
   }
}

