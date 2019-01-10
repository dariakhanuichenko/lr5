
function get_data(){
	var year,month,date,hours,minutes;
	
	year=parseInt(document.getElementById('yy').value);
	month=parseInt(document.getElementById('mm').value);
	date=parseInt(document.getElementById('dd').value);

	
	var days=((month-1)*30)+date;
	
	var result = Math.round(days/7)+1;
	document.write('It\'s currently week ' + result );
	}