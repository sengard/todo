    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Задачник</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!-- <li><a href="/">Домой</a></li>
            <li><a href="/tasks">Задания</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_COOKIE[App\Controllers\UsersController::COOKIE_NAME])) : ?>
                  <li class="active"><a href="#">Привет <?= $_COOKIE[App\Controllers\UsersController::COOKIE_USER_NAME] ?> <span class="sr-only">(current)</span></a></li>
                  <li><a href="/logout">Выход </a></li>
              <?php else : ?>
                 <li><a href="/login">Вход </a></li>
                 <li><a href="/users">Регистрация </a></li>
              <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>