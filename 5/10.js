var start = Date.now(); // ��������� ����� ������

var timer = setInterval(function() {
  // ��������� ������� ������� ������ � ������ ��������
  var timePassed = Date.now() - start;

  if (timePassed >= 2000) {
    clearInterval(timer); // ����� ����� 2 �������
    return;
  }

  // ������ ��������� ��������, ��������������� ������� timePassed
  draw(timePassed);

}, 20);

// � �� ����� ��� timePassed ��� �� 0 �� 2000
// left ��������� �������� �� 0 �� 400px
function draw(timePassed) {
  train.style.left = timePassed / 5 + 'px';
}