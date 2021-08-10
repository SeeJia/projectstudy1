<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="utf-8">
  <title>FoodRes</title>
  
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu&display=swap" rel="stylesheet">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
   <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  
   <script src="https://kit.fontawesome.com/9fc6891543.js" crossorigin="anonymous"></script>

  <!-- css stylesheet -->
  <link rel="stylesheet" href="css/foodstyles.css"> 

<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
  
 <!-- title section -->
 <section class="colored-section" id="title"></section>

<div class="container-fluid">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="">FoodRes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
         <li class="nav-item">
           <a class="nav-link" href="index.html#testimonials">Menu</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="index.html#pricing">Categories</a>
        </li>
         <li class="nav-item">
          <!-- <a class="nav-link" href="#footer">Contact</a> -->
           <a class="nav-link" href="contact.php">Contact</a>
        </li>
       </ul>
       </div>
    </nav>

<!-- php for contact field -->
<?php
// define variables and set to empty values
$nameErr = $emailErr = "";
$name = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Contact</h2>
<p><span class="error">* required field</span></p>
<form action="mailto:seejiajia1010@gmail.com" method="POST" enctype="text/plain">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="32"></textarea>
  <br><br>
  <input type="submit">  
</form>

</body>
</html>