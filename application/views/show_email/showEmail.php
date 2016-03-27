  <?php foreach ($email as $e) { ?>
 <form class="form-horizontal" method="GET" action="<?php echo base_url();?>email/show/?cid=<?php
    echo $e['id'];?>">
     <div class="form-group">
      <label  class="col-xs-4 control-label">Addressee :</label>
      <div class="col-xs-4">
        <input type="email" class="form-control" value='<?php echo $e['addressee']; ?>' name="nemail" placeholder="Addressee" disabled>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-xs-4 control-label">Subject :</label>
      <div class="col-xs-4">
        <input type="text" class="form-control" value='<?php echo $e['subject']; ?>' name="nsubject" placeholder="Subject" disabled>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-xs-4 control-label">Message :</label>
      
       <div class="col-xs-4">
      <textarea name="nmessage" class="form-control" disabled style=" width: 365px; height: 200px;"><?php echo $e['message'];?>
      </textarea><br />
      </div>
    <?php } ?>
    <div class="form-group">
      <div class="col-sm-offset-4 col-xs-4" >
        
        <a class="btn btn-danger btn-lg btn-block" href="<?php echo base_url();?>email/view/">Back</a>
        </div>
      </div>
   
  </form>
