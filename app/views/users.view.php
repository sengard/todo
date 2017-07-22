<?php require('partials/head.php'); ?>
<h1>Регистрация</h1>

<form method="POST" action="/users">
     Имя  <input class="form-control" name="name"></input><br>
    Е-mail <input class="form-control" name="email"></input><br>
   Пароль <input class="form-control" name="password"></input><br>
    <button class="btn btn-default" type="submit">Регистрация</button>
</form>

    <h1>All Users</h1>

<?php foreach ($users as $user) : ?>
    <li><?= $user->name; ?></li>
<?php endforeach; ?>




<?php require('partials/footer.php'); ?>
