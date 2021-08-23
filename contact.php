
  <?php
require('nav.php');
  ?>
<div class="contact">
<h1>Contactez nous</h1>
<form action="contact.php" method="post" class="w-50">
  <div class="form-group">
  <label for="nom">Nom et prenom</label>
    <input type="text" class="form-control" id="" placeholder="John doe" name='nom'>
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="" placeholder="name@example.com" name="email">
  </div>
  <div class="form-group">
    <label for="message">Example textarea</label>
    <textarea class="form-control" name="message" rows="3"></textarea>
    <button class="btn btn-primary" type="submit" name="ajouter">Envoyer</button>
  </div>
</form>
<?php
if(isset($_POST['ajouter'])){
  if(isset($_POST['nom']) && isset($_POST['email']) && $_POST['message']){
    $nom = strip_tags($_POST['nom']);
   $message = htmlspecialchars($_POST['message']);
   $email = htmlspecialchars($_POST['email']);
   require('cnx.php');

   $sql = 'INSERT INTO contact(nom,email,message) VALUES(:nom, :email, :message)';
   $query = $cnx->prepare($sql);

   $query->bindValue(':nom', $nom, PDO::PARAM_STR);
   $query->bindValue(':email', $email, PDO::PARAM_STR);
   $query->bindValue(':message', $message, PDO::PARAM_STR);


   if(!$query->execute()){
     die('Une erreur est survenue');
   }
   $id = $cnx->lastInsertId();
   die('Formulaire ajouté sous l id '.$id);


  }else{
    die('Formulaire incomplet');
  }
}
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;
// require_once "phpmailer/Exception.php";
// require_once "phpmailer/PHPMailer.php";
// require_once "phpmailer/SMTP.php";
// $mail = new PHPMailer(true);

// try{
//   $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//   $mail->isSMTP();
//   $mail->Host = 'localhost';
//   $mail->Port = 8081;
//   $mail->CharSet = 'utf-8';
// $mail->addAddress('a@live.fr');
// $mail->setFrom('o@live.fr');
// $mail->Subject ='Sujet du message';
// $mail->Body = 'lorem ipsum';
// $mail->send();
// echo 'Message envoyé';
// }
// catch(Exception $e){
// echo $mail->ErrorInfo;
// }
?>
</div>
<?php 
require('footer.php');
?>