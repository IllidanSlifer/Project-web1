<div class="page-header"><center><h1>WebEmail</center></h1></div>
<div class="container">
<form class="form-horizontal" method="POST" action="<?php echo base_url();?>user/authenticate">
  <div class="form-group">
    <label for="username" class="col-xs-4 control-label">Username: </label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="nusername" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-xs-4 control-label">Password :</label>
    <div class="col-xs-4">
      <input type="password" class="form-control" name="npassword" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-xs-4">
      <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Log In</button>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-xs-4" >
      
      <a href="<?php echo base_url();?>user/register" class="btn btn-danger btn-lg btn-block" role="button">Sign Up</a>
    </div>
  </div>
</form>
</div>