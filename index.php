<?php

  if($_POST["submit"]) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(!$_POST['name']) {
      $error = '<br>Please enter your <strong>name</strong>';
    }
    if(!$_POST['email']) {
      $error .= '<br>Please enter your <strong>email</strong>';
    }
    if(!$_POST['message']) {
      $error .= '<br>Please enter your <strong>message</strong>';
    }
    if($_POST['email']!='' AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error .= "<br> Please enter a <strong>valid email address</strong>";
    }
    if($error) {
    $result='<div class="alert alert-danger">There were error(s) in your form:'.$error.'</div>';
    } else {
        if(mail("arthur.bonavita@gmail.com","Message from website", "Name: " . $name)) {
            $result='<div class="alert alert-success"><strong>Thank you, '.$name.'!</strong> I will be in touch!</div>';
            $name = "";
            $email = "";
            $message= "";

        } else {
      $result='<div class="alert alert-danger">Sorry, there was an error with your message. Try again later.</div>';

          }

        }

  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MY FORM</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>Email Form</h1>
        <p class="lead">Let me an message, I'll respond ASAP.</p>
        <?php
        echo $result;
         ?>
      </div>
      <div class="col-md-6 col-md-offset-3">
        <form method="post">
            <div class="form-group">
              <label for="name">Your Name:</label>
              <input type="text" name="name" class="form-control" placeholder="Lisa" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
              <label for="email">Your Email:</label>
              <input type="email" name="email" class="form-control" placeholder="lisa@gmail.com" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
              <label for="name">Your Message:</label>
              <textarea name="message" class="form-control" placeholder="I loved your email form!!! ;D"><?php echo $message ?></textarea>
            </div>

            <input class="btn btn-success" name="submit" type="submit">

        </form>
      </div>
    </div>


    </div>


    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
