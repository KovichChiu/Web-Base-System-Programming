<?php
  date_default_timezone_set('Asia/Taipei');
  $today = getdate(); //monday week begin reconvert

  $d = ((intval($today['mday']) < 10)?"0":"").$today['mday'];
  $m = ((intval($today['mon']) < 10)?"0":"").$today['mon'];
  $y = $today['year'];
  session_start();
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../">KC Inc.</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#" data-toggle="modal" data-target="#Modal_Opinion">提出意見</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href=""><?php echo "$y/$m/$d"; ?></a></li>
        <?php 
          if(isset( $_SESSION['Acc'] )){
            echo '<li>';
            echo '<a href="">Hi，'.$_SESSION['uName'].'</a>';
            echo '</li>';
          }
        ?>
        <li class="nav-item">
          <?php 
            echo (!isset( $_SESSION['Acc'] ))?'<a href="../log_login.php">登入</a>':'<a href="../log_logout.php">登出</a>';
          ?>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- Modal_Opinion -->
<div class="modal fade" id="Modal_Opinion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">提出意見</h4>
      </div>
      <div class="modal-body">
        <form action="Opi_sql.php" method="POST">
          <fieldset class="form-group">
            <label>意見標題</label>
            <input type="text" class="form-control" placeholder="Title" name="title">
            <small class="text-muted">字數不得超過25字</small>
          </fieldset>
          <fieldset class="form-group">
            <label>意見提出人</label>
            <input type="text" class="form-control" <?php echo 'value="'.$_SESSION['uName'].'"'; ?> name="name" readonly=readonly>
          </fieldset>
          <fieldset class="form-group">
            <label>意見</label>
            <textarea class="form-control" placeholder="Memo" name="memo"></textarea>
            <small class="text-muted">請詳細說明想提出之意見</small>
          </fieldset>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" <?php if(!isset($_SESSION['Acc'])){echo 'disabled';} ?>>Save</button>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->