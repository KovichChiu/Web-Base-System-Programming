<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta content="text/html" charset="UTF-8" http-equiv="content-type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="http://120.108.114.206/~kovich/font-awesome-4.5.0/css/font-awesome.css">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>Tooltip Example</h3>
  <a href="#" data-toggle="tooltip" title="Hooray!">Hover over me</a>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</body>
</html>
