<?php if (isset($this->session->userdata['logged_in'])) {
     $log = ($this->session->userdata['logged_in']['is_loged']);
     $username = ($this->session->userdata['logged_in']['username']);
     $email = ($this->session->userdata['logged_in']['email']);
} ?>
<nav class="navbar navbar-default" role="navigation">
     <div class="container-fluid">
          <!--header section -->
          <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
               </button>
          </div>
          <!-- menu section -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
               <ul class="nav navbar-nav navbar-right">

                <li class="navbar-right"><a href="#">Web ILLIDAN</a></li>

                <?php 
                
                if (!empty($log)) {
                    if($log == true) {
                     
                         echo "<li><a href=".base_url('email/view').">Hey Mortal".$username."</a></li>";
                         echo "<li><a href=".base_url('user/logout').">Log Out</a></li>";
                    } else{
                         echo "<li><a href=".base_url('user/login').">Login</a></li>";
                         echo "<li><a href=".base_url('user/register').">Register</a></li>";
                    }
               }
              ?>
              
         </ul>
    </div>
</div>
</nav>