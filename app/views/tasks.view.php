<?php require('partials/head.php'); ?>


<h1>Добавить задачу</h1>

<form method="POST" action="/tasks" multipart="" enctype="multipart/form-data"  id="formfield">
<?php if (!isset($_COOKIE[App\Controllers\UsersController::COOKIE_NAME])) : ?>
    Email <input class="form-control" name="email" id="email"></input><br>
    Имя  <input class="form-control" name="name" id="name"></input><br>
<?php endif; ?>
    Описание <textarea class="form-control" name="description" id="description"></textarea><br>
    
   	<div class="form-group">
      <label for="exampleInputFile">Изображение</label>
      <input type="file"  name="img[]" multiple accept="image/*" id="img">
      <p class="help-block">Формат jpg, png, jpeg, gif не более 2(двух) мегабайт.</p>
    </div>
    <button class="btn btn-success" type="submit">Добавить</button>
</form>
<br>
<input type="button" name="btn" value="Предпросмотр" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary" />

<h1>Все задачи</h1>

<?php foreach ($tasks as $task) : ?>
 <div class="col-md-12">
  <h2><?= $task[0]['name']?></h2>
  <h4><?= $task[0]['email']?></h4>
  <p><?= $task[0]['description']?></p>
  <?php foreach ($task as $p) : ?>
    <img src="/public/uploads/<?= $p['file'] ?>" class="img-rounded imgContainer" alt="image"> 
  <?php endforeach; ?>


</div>
<?php endforeach; ?>


<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Submit
            </div>
            <div class="modal-body">
                Are you sure you want to submit the following details?

                <!-- We display the details entered by the user here -->
                <table class="table">
                    <tr>
                        <th>Описание</th>
                        <td id="description_modal"></td>
                    </tr>
                    <tr>
                        <th>Картинки </th>
                        <td id="img_modal"></td>
                    </tr>
                </table>

            </div>

  <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a href="#" id="submit" class="btn btn-success success">Submit</a>
        </div>
    </div>
</div>


<?php require('partials/footer.php'); ?>
