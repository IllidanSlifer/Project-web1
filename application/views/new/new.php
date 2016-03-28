
<br/>
<div class="container ">

  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>email/insert/">
   <div class="form-group">
    <label  class="col-xs-4 control-label">addressee :</label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="nemail" placeholder="addressee">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label">Subject:</label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="nsubject" placeholder="Subject">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label">Message :</label>
    
    <div class="col-xs-4">
      <textarea name="nmessage" class="form-control" style=" width: 365px; height: 200px;">
      </textarea><br />
    </div>
    
    
  </div>
  
  <div class="row">
    <div class="col-sm-offset-4 col-xs-4">
      <button type="submit" class="btn btn-primary btn-lg btn-block" name="send" >Send</button>
    </div>
  </div>
</br>
<div class="form-group">
  <div class="col-sm-offset-4 col-xs-4" >
    
    <a class="btn btn-danger btn-lg btn-block" href="<?php echo base_url();?>email/view/">Cancel</a>
  </form>
</div>
</form>
</div>