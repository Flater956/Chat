$(document).ready(function () {
  $("#welcome-btn").on('click',function (event) {
       if ($("#name").val() == ''){
           event.preventDefault();
           alert('Введите имя');
       }


      }
  );
});