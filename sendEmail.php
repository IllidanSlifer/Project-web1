    <?php 

    include("class.phpmailer.php");
    include("class.smtp.php"); 

    $servername= '127.0.0.1';
    $user = 'root';
    $password = '';

    function getEmail($servername,$user,$password){
      try {
          $conn = new PDO("mysql:host=$servername;dbname=appmail", $user,$password);
        // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          
          $stmt = $conn->query("SELECT `id`,`addressee`,`iduser`,`subject`,`message` FROM `emails` WHERE  `estado` = 'Pending' ");
          
          return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      catch(PDOException $e)
      {
         echo "Connection failed: " . $e->getMessage();
     }

 }
 function getUsers($servername,$user,$password){
   try {
      $conn = new PDO("mysql:host=$servername;dbname=appmail", $user,$password);
      
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $stmt = $conn->query("SELECT * FROM `users`");
      return $stmt->fetchAll(PDO::FETCH_OBJ);
      
      

  } catch (Exception $e) {
     echo "Connection failed: " . $e->getMessage();
 }
}




$users = getUsers($servername,$user,$password);
$emails = getEmail($servername,$user,$password);
foreach ($emails as $email) {
  

  $idus = $email->iduser;

  foreach ($users as $user) {
    $idn = $user->id;
    if ($idn == $idus) {
        $name = $user->name;
        $email = $user->email;

    }

}


if (count($emails) > 0) {
 $mail = new PHPMailer();
                //Then you have to Start Validation SMTP :
 
 $mail->IsSMTP();
 $mail->SMTPAuth = true;
 $mail->SMTPSecure = "ssl"; 
    			$mail->Host = "smtp.gmail.com"; // SMTP to use. be specific. smtp.elserver.com
    			$mail->Username = "kstryper@gmail.com"; 
    			$mail->Password = "stryper123"; 
    			$mail->Port = 465; 
    			
              
             

    			$mail->From = $email; 
    			$mail->FromName = $name;
    			$mail->Subject = $email->subject;
    			$mail->AltBody = "Hey How are you?";  
    			$mail->MsgHTML($email->message); 
              
    			$mail->AddAddress($email->addressee); 
    			$mail->IsHTML(true); 
              
              
    			$exito = $mail->Send(); // send email
    			echo "done";

                if($exito){
                    try {
                       $servername= '127.0.0.1';
                       $user = 'root';
                       $password = '';
                       $conn = new PDO("mysql:host=$servername;dbname=appmail", $user,$password);
            // set the PDO error mode to exception
                       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       echo "Connected successfully" . "\n"; 


                       $sql2 = sprintf("UPDATE `emails` SET `estado`='Sent' WHERE `id`=".$email->id);

                //echo $sql2; die(); 
                       $stmt = $conn->prepare($sql2);  

                       $stmt->execute();

                       echo $stmt->rowCount() . " Record updated successfully" ."\n" ;


                   }
                   catch(PDOException $e)
                   {
                       echo "Connection failed: " . $e->getMessage();
                   }

               }
               else
               {
                 echo "There was a drawback. Contact an administrator";
             }

         }	
         


     }	
     



     
     
