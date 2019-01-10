function nummax(){
var a=new Array();
a[0]=parseInt(document.getElementById('a').value);
a[1]=parseInt(document.getElementById('b').value);
a[2]=parseInt(document.getElementById('c').value);
a[3]=parseInt(document.getElementById('d').value);
a[4]=parseInt(document.getElementById('e').value);
a[5]=parseInt(document.getElementById('f').value);
a[6]=parseInt(document.getElementById('g').value);
	var n1,n2,n3,n4,n5,n6;
var nummax=0;
for(i=0;i<7;i++){
	if(a[i]>999999 || a[i]==null)
	{ 

console.log("error input on "+a[i]);
}
	else {
		
	if(a[i]==000000){
		nummax++;
	}
	n1=a[i]%10;
	n2=(a[i]%100-n1)/10;
	n3=(a[i]%1000-n2*10-n1)/100;
	n4=(a[i]%10000-n3*100-n2*10-n1)/1000;
	n5=(a[i]%100000-n4*1000-n3*100-n2*10-n1)/10000;
	n6=(a[i]%1000000-n5*10000-n4*1000-n3*100-n2*10-n1)/100000;
	
	if(n1+n2+n3==n4+n5+n6){
		nummax++;
		console.log('nummax current '+nummax);
	}
}

}
alert('nummax '+nummax);
}