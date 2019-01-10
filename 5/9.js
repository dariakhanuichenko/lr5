function calculate_words( ){
	var string=document.getElementById("text").value;
	var counter = 1;

            // злиття декількох пробілів в 1
            string=string.replace(/[\s]+/gim, ' ');

            // перебирає рядок і рахує слова
            string.replace(/(\s+)/g, function (a) {
               // Fдля кожного слова збільшити лічильник на 1
               counter++;
            });

            
alert(counter);
}

