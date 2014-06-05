function presente_tableau ( str, ul){
   var index = 0;
   var m, li, label, input;
   while ( m = /^([^;]+);?(.*)$/.exec(str) ){
      index++;
      li = document.createElement('li');
      label = document.createElement('label');
      input = document.createElement('input');
      label.setAttribute('for','id' + index );
      label.appendChild(document.createTextNode(m[1]));
      li.appendChild(label);
      input.name = "n[" + m[1] + "]";
      input.style = "margin: 0.5em;";
      input.id = "id" + index;
      li.appendChild(input);
      ul.appendChild(li);
      str = m[2];
   }
}