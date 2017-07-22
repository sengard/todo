<?php require('partials/head.php'); ?>

    <h1>Войдите</h1>
    <form method="POST" action="/login">
       Имя <input class="form-control" name="name"></input><br>
       Пароль <input class="form-control" name="password"></input><br>
        <button class="btn btn-default" type="submit">Вход</button>
    </form>

<?php require('partials/footer.php'); ?>
