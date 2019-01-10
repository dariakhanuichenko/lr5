function nummax(){
var a=new Array();
a[0]=parseInt(document.getElementById('a').value);
a[1]=parseInt(document.getElementById('b').value);
a[2]=parseInt(document.getElementById('c').value);
a[3]=parseInt(document.getElementById('d').value);
a[4]=parseInt(document.getElementById('e').value);

var max=0;
var nummax=0;
for(i=0;i<5;i++){
	if(a[i]>max){
		max=a[i];
	}
}
for(i=0;i<5;i++){
	if(a[i]==max){
		nummax++;
	}
}
alert(nummax);
}