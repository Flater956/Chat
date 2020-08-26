<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sos</title>
    <link rel="stylesheet" href="/style/welcome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<body>
<div id="wrapper" >
    <div id="welcome" class="card">
        <div class="welcome-text">
            <h2>Приветствую тебя, друг</h2>
            <h3 class="text-secondary">Введи свое имя</h3>
        </div>
        <div class="welcome-form">
            <form action="/views/main.php" method="post">
                <input id="name" name="userName" type="text" class="form-control">
                <div class="col-lg-12 d-flex justify-content-center">
                    <button id="welcome-btn" type="submit" class="btn btn-outline-success">Присоединиться к чату</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/js/welcoome.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
