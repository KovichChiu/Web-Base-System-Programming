<?php
  // echo $idsql;
  date_default_timezone_set('Asia/Taipei');
  $today = getdate(); //monday week begin reconvert

  $d = ((intval($today['mday']) < 10)?"0":"").$today['mday'];
  $m = ((intval($today['mon']) < 10)?"0":"").$today['mon'];
  $y = $today['year'];
?>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="index.php">KC Inc.</a>
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">交易平台</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">工作範圍</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#Modal_about">關於</a>
    </li>
  </ul>
  <ul class="nav navbar-nav pull-right">
    <li class="nav-item active">
      <a class="nav-link" href=""><?php echo "$y/$m/$d"; ?></a>
    </li>
  </ul>
</nav>



<!-- Modal_about -->
<div class="modal fade" id="Modal_about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">關於 <small> About </small></h4>
      </div>
      <div class="modal-body">
        <p>KC Inc. 是由邱頎夫帶領，周悅鵬、程皓倫三人，共組的一個小小公司，...。</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger-outline" data-dismiss="modal">關閉 Close</button>
      </div>
    </div>
  </div>
</div>