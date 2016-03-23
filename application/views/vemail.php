
<div class='container'>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="output">
      <br/>
      <a href="<?php echo base_url();?>email/new" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>New</a>
      
      <br/>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Addressee</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Opcions</th>
            </tr>
          </thead>
          <tbody>
            
            <?php foreach ($emails as $email) { ?>
            
            <tr>
              <td><?php echo $email['id']; ?></td>
              <td><?php echo $email['addressee']; ?></td>
              <td><?php echo $email['subject']; ?></td>
              <td><?php echo $email['message']; ?></td>
              <td>

                <a href="<?php echo base_url();?>email/edit/?cid=<?php echo $email['id']?>"><span class="glyphicon glyphicon-edit">Edit</a>
                
                |<a href="<?php echo base_url();?>email/delete/?cid=<?php echo $email['id']?>" onClick="return confirm('Do you want to delete the email?');"><span class="glyphicon glyphicon-trash">Eliminar</a>
              </td>
              
            </tr>
            <?php }?>
            
          </tbody>
        </table>
      </div>
    </div>
    

    <div role="tabpanel" class="tab-pane" id="sent">
      <br/>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Addressee</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Opcions</th>
            </tr>
          </thead>
          <tbody>
            
           <?php foreach ($emaile as $emailv) { ?>
           
           <tr>
            <td><?php echo $emailv['id']; ?></td>
            <td><?php echo $emailv['addressee']; ?></td>
            <td><?php echo $emailv['subject']; ?></td>
            <td><?php echo $emailv['message']; ?></td>
            
            <td>
              <a href="<?php echo base_url();?>email/delete/?cid=<?php echo $emailv['id']?>" onClick="return confirm('Do you want to delete the email?');"><span class="glyphicon glyphicon-trash">Eliminar</a>
            </td>
            
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <div role="tabpanel" class="tab-pane" id="Log Out">
  </br>
  <center><a href="<?php echo base_url();?>user/login" class="btn btn-danger"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Logout</a>
  </center>
</div>

</div>


</div>