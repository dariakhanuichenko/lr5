function change_table_bg()
{
	var bgc_lor=document.getElementById("coloR").value;
	tab.setAttribute("bgcolor",bgc_lor);
	

	/*var count=$('#tab tr td').size();
	var count=document.getElementById('tab1').rows[0].cells.length;
	var cols=document.getElementById('tab1').cols[0].cells.length;*/
	
	var x = document.getElementsByTagName('th');
	var 
	color1=document.getElementById("color1").value;
	var color2=document.getElementById("color2").value;
	var color3=document.getElementById("color3").value;
	var color4=document.getElementById("color4").value;
   for(i=0;i<x.length-2;i+=4) {
	   
     x[i].style.backgroundColor =color1;
	 x[i+1].style.backgroundColor =color2;
	 x[i+2].style.backgroundColor =color3;
	 x[i+3].style.backgroundColor =color4;
   }
}
	