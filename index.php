<?php
session_start();
if(isset($_SESSION["userName"]) && isset($_SESSION["phone"])){

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hormoney</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <span><h1>HarmonYRoom</h1></span>
  <div class="chat">
    <h2>Welcome to <span><?= $_SESSION["userName"]?></span></h2>
    <div class="msg">
    <img src="image/harmonybg.png" alt="harmonybglogo">
      


    </div>
    <div class="input_msg">
      <input type="text" placeholder="input your though" id="input_msg" class="input1" >
      <button onclick="update()">Send</button>
    </div>
  </div>
</body>
<script src="js/index.js"></script>

</html>

<?php
}else{

  header("location: login.php");


}
?>