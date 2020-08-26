<?php
if ($_POST['userName']){
    $userName=$_POST['userName'];
} else {
    die("Отказано в доступе, пожалуйста введите имя");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sos</title>
    <link rel="stylesheet" href="/style/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<body>
<div id="wrapper">
    <div class="row">
        <div class="col-lg-8 ml-4 col-md-8">
            <h3 class="text-info">Вы используйте имя <strong id="user_name"><?=$userName ?></strong></h3>
            <div class="card" id="chat_output"></div>
            <div><textarea id="chat_input"></textarea></div>
        </div>
        <div class="col-lg-3 ml-4 col-md-3">
            <div class="card mt-4"><h4 class="ml-2">Сейчас в сети:</h4><br>
                <div id="chat_users"></div>
            </div>
            <button class="btn btn-danger mt-2" id="disconnect-btn">Покинуть чат</button>
        </div>
    </div>
</div>
<script src="/js/client.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>