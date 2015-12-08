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
      <a class="nav-link" href="#">Features</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Pricing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
  </ul>
  <ul class="nav navbar-nav pull-right">
    <li class="nav-item active">
      <a class="nav-link" href=""><?php echo "$y/$m/$d"; ?></a>
    </li>
  </ul>
</nav>