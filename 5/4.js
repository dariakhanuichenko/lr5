function triengle(){
var a,b,c;
a=parseInt(document.getElementById('a').value);
b=parseInt(document.getElementById('b').value);
c=parseInt(document.getElementById('c').value);
if((a+b)>c&&(a+c)>b&&(c+b)>a&&a>0&&b>0&&c>0&&a!=null&&b!=null&&c!=null)
{
	alert ("you can build a triengle");
}
else 
{
	alert ("you cann't build a triengle");
}}