function listerTab( tab ){
   var somme = 0;
   for ( var access in tab )
      somme += ( is_num(tab[access]) ) ? tab[access] : 0;
   return somme;
}