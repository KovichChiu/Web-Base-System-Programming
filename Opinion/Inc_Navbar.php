<?php
  date_default_timezone_set('Asia/Taipei');
  $today = getdate(); //monday week begin reconvert

  $d = ((intval($today['mday']) < 10)?"0":"").$today['mday'];
  $m = ((intval($today['mon']) < 10)?"0":"").$today['mon'];
  $y = $today['year'];
?>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="https://120.108.114.206/~kovich">KC Inc.</a>
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#Modal_Opinion">提出意見</a>
    </li>
  </ul>
  <ul class="nav navbar-nav pull-right">
    <li class="nav-item active">
      <a class="nav-link" href=""><?php echo "$y/$m/$d"; ?></a>
    </li>
  </ul>
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
            <input type="text" class="form-control" placeholder="Name" name="name">
            <small class="text-muted">暱稱也可</small>
          </fieldset>
          <fieldset class="form-group">
            <label>意見</label>
            <input type="text" class="form-control" placeholder="Memo" name="memo">
            <small class="text-muted">請詳細說明想提出之意見</small>
          </fieldset>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger-outline" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success-outline">Save</button>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->