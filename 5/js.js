
function first_exercise(){
document.Area.aarea.focus();
var x1,x2,x3,y1,y2,y3;
x1=parseInt(document.getElementById('x1').value);
y1=parseInt(document.getElementById('y1').value);
x2=parseInt(document.getElementById('x2').value);
y2=parseInt(document.getElementById('y2').value);
x3=parseInt(document.getElementById('x3').value);
y3=parseInt(document.getElementById('y3').value);

var S=((y1+y3)*(x3-x1)+(y3+y2)*(x2-x3)-(y1+y2)*(x2-x1))/2;
alert(S);
}
    
