function calculate_words( ){
	var string=document.getElementById("text").value;
	var counter = 1;

            // ������ �������� ������ � 1
            string=string.replace(/[\s]+/gim, ' ');

            // �������� ����� � ���� �����
            string.replace(/(\s+)/g, function (a) {
               // F��� ������� ����� �������� �������� �� 1
               counter++;
            });

            
alert(counter);
}

