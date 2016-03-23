<?php if (isset($this->session->userdata['logged_in'])) {
     $username = ($this->session->userdata['logged_in']['username']);
     $email = ($this->session->userdata['logged_in']['email']);
} ?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
     <div class="container-fluid">
          <!--header section -->
          <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">CodeIgniter WEmail</a>
          </div>
          <!-- menu section -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
               <ul class="nav navbar-nav navbar-left">
                    
                    <li role="presentation" class="active"><a href="#output" aria-controls="output" role="tab" data-toggle="tab">Output</a></li>
                    <li role="presentation"><a href="#sent" aria-controls="sent" role="tab" data-toggle="tab">Sent</a></li>
                    
               </ul>
               <ul class="nav navbar-nav navbar-right">
                    <li><a>Hey Human <?php echo $username ?></a></li>
                    <li><a href="<?php echo base_url('user/logout') ?>">Log Out</a></li>
               </ul>
          </div>
     </div>
</nav>