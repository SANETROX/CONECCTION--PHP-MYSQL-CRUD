<?php  include("db.php") ?>
<?php include("includes/header.php") ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4">

    <?php if(isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php   session_unset(); }?>  <!-- Session_unset() limpiamos los datos que hay en ssesion -->
      
      <div class="card card-body">
        <form action="save_task.php" method="POST"> <!--Atraves del metodo POST envia los datos del formulario  a save_task.php-->
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" id=""  rows="2" class="form-control" placeholder="Task description"></textarea>
            <input type="submit" class="btn btn-success btn-block" name="save task" value="Save Task">
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-8">
      <table class="table table-dark table- striped table-bordered">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $query = "SELECT * FROM task";
          $result_task = mysqli_query($conn, $query);

          while($row = mysqli_fetch_array($result_task)) {   ?>     <!--msqli_fetch_array() recorre todas mis tareas -->
          <tr>
            <td> <?php echo $row['title']?></td>
            <td> <?php echo $row['description']?></td>
            <td> <?php echo $row['create_at']?></td>
            <td class="text-center">
              <a class = "btn btn-sm btn-info" style="margin:5px" href="edit.php?id=<?php echo $row['id'] ?>"><i class="fas fa-edit"></i></a>
              <a class = "btn btn-sm btn-danger" style="margin:5px"  href="delete_task.php?id=<?php echo $row['id'] ?>"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <?php } ?>
      </tbody>

      </table>
    </div>
  </div>

</div>

<?php include("includes/footer.php")?>