<?php 
  session_start();
  function Navbar( $pageName ){ 
  // echo $idsql;
  date_default_timezone_set('Asia/Taipei');
  $today = getdate(); //monday week begin reconvert

  $d = ((intval($today['mday']) < 10)?"0":"").$today['mday'];
  $m = ((intval($today['mon']) < 10)?"0":"").$today['mon'];
  $y = $today['year'];

  
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
      <a class="navbar-brand" href="http://120.108.114.206/~kovich">KC Inc.</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- 首頁 -->
        <li <?php if( $pageName == "home" ){ echo 'class="active"'; } ?> ><a href="index.php"> <i class="fa fa-home"></i> 首頁</a></li>

        <!-- 交易平台 -->
        <li <?php if( $pageName == "transaction" ){ echo 'class="active"'; } ?> ><a href="#"> <i class="fa fa-shopping-cart"></i> 交易平台</a></li>

        <!-- 意見 -->
        <li <?php if( $pageName == "opinion" ){ echo 'class="active"'; } ?> ><a href="http://120.108.114.206/~kovich/Opinion/"> <i class="fa fa-info-circle"></i> 意見</a></li>

        <!-- 關於 -->
        <li <?php if( $pageName == "about" ){ echo 'class="active"'; } ?> ><a href="#" data-toggle="modal" data-target="#Modal_about"> <i class="fa fa-bookmark-o"></i> 關於</a>

        <!-- 使用者管理 -->
        <?php if($_SESSION['Rights'] == 1){ ?>
          <li <?php if( $pageName == "user_management" ){ echo 'class="active"'; } ?> ><a href="#"> <i class="fa fa-users"></i> 使用者管理 </a>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- 日期 -->
        <li><a href=""><?php echo "$y/$m/$d"; ?></a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php echo (isset( $_SESSION['Acc'] ))?("Hi ! ".$_SESSION['uName']):"Log in" ; ?> <span class="caret"></span>
          </a>
          <?php if(isset( $_SESSION['Acc'] )){ ?>
            <ul class="dropdown-menu">
              <li><a href="user_index.php"> <i class="fa fa-user"></i> User Control </a></li>
              <li><a href="#">xxxxxxx</a></li>
              <li><a href="#">ooooooo</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="log_logout.php"> <i class="fa fa-sign-out"></i> Log out</a></li>
            </ul>
          <?php }else{ ?>
            <ul class="dropdown-menu">
              <li><a href="log_signup.php"> <i class="fa fa-external-link-square"></i> New User? </a></li>
              <li role="separator" class="divider"></li>
              <li><a href="log_login.php"> <i class="fa fa-sign-in"></i> Log in </a></li>
            </ul>
          <?php } ?>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php } ?>



<!-- Modal_about -->
<div class="modal fade" id="Modal_about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h2>關於 <small> About </small></h2>
      </div>
      <div class="modal-body">
        <p>KC Inc. 是由邱頎夫帶領，周悅鵬、程皓倫三人，共組的一個小小公司，...。</p>
        <p>後來，因為人手不足又增加了李韋達、黃鴻儒。</p>
        <p>現在，我們是五個人的大家庭了...。</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">關閉 Close</button>
      </div>
    </div>
  </div>
</div>