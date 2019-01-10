function validateEmail(){  
   var elementValue= document.getElementById('email').value;
   var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
   if(String(elementValue).search (filter) != -1) {
	   alert("true emain");
   }
   else {
	   alert("false email");
   }
 } 