function change_attributes_hr(){
	var a_ign=document.getElementById("aligN").value;
	var c_lor=document.getElementById("coloR").value;
	var s_ze=document.getElementById("sizE").value;
	var w_dth=document.getElementById("widtH").value;
	
	if(a_ign!=""&&c_lor!=""&&s_ze!=""&&w_dth!="")
	{
	HR.setAttribute('align',a_ign);
	HR.setAttribute('color',c_lor);
	HR.setAttribute('size',s_ze);
	HR.setAttribute('width',w_dth);
	}

}