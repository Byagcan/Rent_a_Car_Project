<?php
session_start();
include("../connect.php");
if (!empty($_SESSION["email"])) {
  $email = $_SESSION["email"];
} else {
  header("Location:login_manager.php");
}

$sql1 = mysqli_query($connection, "SELECT * from conditions where id='1'");
$conditions1 = mysqli_fetch_assoc($sql1);
$sql2 = mysqli_query($connection, "SELECT * from conditions where id='2'");
$conditions2 = mysqli_fetch_assoc($sql2);
$sql3 = mysqli_query($connection, "SELECT * from conditions where id='3'");
$conditions3 = mysqli_fetch_assoc($sql3);
$sql4 = mysqli_query($connection, "SELECT * from conditions where id='4'");
$conditions4 = mysqli_fetch_assoc($sql4);
$sql5 = mysqli_query($connection, "SELECT * from conditions where id='5'");
$conditions5 = mysqli_fetch_assoc($sql5);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/condition_manager.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" />
</head>

<body>
  <!-- Header start -->
  <header id="header">
    <div class="header">
      <div class="container">
        <div class="header-navbar">
          <div class="header-logo">
            <a href="index_manager.php" style="cursor: pointer"><img id="logo" src="../images/1.png" alt="" /></a>
            <div class="header-name">
              <h1>Rent A Car</h1>
            </div>
          </div>
          <div class="header-menu">
            <ul>
              <li><a href="index_manager.php">Home</a></li>
              <li><a href="login_manager.php">Log In</a></li>
              <li><a href="addcar_manager.php">Add Car</a></li>
              <li><a href="users_manager.php">Users</a></li>
              <li><a href="condition_manager.php">Conditions</a></li>
              <li id="lasthref">
                <a href="account_manager.php">Account</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Finish -->

  <!-- Conditions Start -->
  <section class="conditions">
    <div class="conditions">
      <h1>Conditions</h1>
      <div class="container">
        <form action="" method="post">

          <div class="C">
            <div class="question">
              <input type="hidden" name="id1" value="<?php echo  $conditions1['id'] ?>">
              <span style="font-size: 30px;" class="material-symbols-outlined">
                help_center
              </span>
              <input name="Q1" type="text" value="<?php echo  $conditions1['question'] ?>">
            </div>
            <div class="answer">
              <span style="font-size: 29px;" class="material-symbols-outlined">
                article
              </span>
              <input name="A1" type="text" value="<?php echo  $conditions1['answer'] ?>">
            </div>
          </div>
          <div class="C">
            <div class="question">
              <input type="hidden" name="id2" value="<?php echo  $conditions2['id'] ?>">
              <span style="font-size: 30px;" class="material-symbols-outlined">
                help_center
              </span>
              <input name="Q2" type="text" value="<?php echo  $conditions2['question'] ?>">
            </div>
            <div class="answer">
              <span style="font-size: 29px;" class="material-symbols-outlined">
                article
              </span>
              <input name="A2" type="text" value="<?php echo  $conditions2['answer'] ?>">
            </div>
          </div>
          <div class="C">
            <div class="question">
              <input type="hidden" name="id3" value="<?php echo  $conditions3['id'] ?>">
              <span style="font-size: 30px;" class="material-symbols-outlined">
                help_center
              </span>
              <input name="Q3" type="text" value="<?php echo  $conditions3['question'] ?>">
            </div>
            <div class="answer">
              <span style="font-size: 29px;" class="material-symbols-outlined">
                article
              </span>
              <input name="A3" type="text" value="<?php echo  $conditions3['answer'] ?>">
            </div>
          </div>
          <div class="C">
            <div class="question">
              <input type="hidden" name="id4" value="<?php echo  $conditions4['id'] ?>">
              <span style="font-size: 30px;" class="material-symbols-outlined">
                help_center
              </span>
              <input name="Q4" type="text" value="<?php echo  $conditions4['question'] ?>">
            </div>
            <div class="answer">
              <span style="font-size: 29px;" class="material-symbols-outlined">
                article
              </span>
              <input name="A4" type="text" value="<?php echo  $conditions4['answer'] ?>">
            </div>
          </div>
          <div class="C">
            <div class="question">
              <input type="hidden" name="id5" value="<?php echo  $conditions5['id'] ?>">
              <span style="font-size: 30px;" class="material-symbols-outlined">
                help_center
              </span>
              <input name="Q5" type="text" value="<?php echo  $conditions5['question'] ?>">
            </div>
            <div class="answer">
              <span style="font-size: 29px;" class="material-symbols-outlined">
                article
              </span>
              <input name="A5" type="text" value="<?php echo  $conditions5['answer'] ?>">
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Edit" name="edit">
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Conditions Finish -->
</body>

</html>
<?php


if (isset($_POST['edit'])) {
  $Q1 = $_POST['Q1'];
  $A1 = $_POST['A1'];
  $id1 = $_POST['id1'];
  if ($Q1 != $conditions1['question'] || $A1 != $conditions1['answer']) {
    $update = mysqli_query($connection, "UPDATE conditions SET  question='$Q1', answer='$A1' where id='$id1' ");
  }
  $Q2 = $_POST['Q2'];
  $A2 = $_POST['A2'];
  $id2 = $_POST['id2'];
  if ($Q2 != $conditions2['question'] || $A2 != $conditions2['answer']) {
    $update = mysqli_query($connection, "UPDATE conditions SET  question='$Q2', answer='$A2' where id='$id2' ");
  }

  $Q3 = $_POST['Q3'];
  $A3 = $_POST['A3'];
  $id3 = $_POST['id3'];
  if ($Q3 != $conditions3['question'] || $A3 != $conditions3['answer']) {
    $update = mysqli_query($connection, "UPDATE conditions SET  question='$Q3', answer='$A3' where id='$id3' ");
  }

  $Q4 = $_POST['Q4'];
  $A4 = $_POST['A4'];
  $id4 = $_POST['id4'];
  if ($Q4 != $conditions4['question'] || $A4 != $conditions4['answer']) {
    $update = mysqli_query($connection, "UPDATE conditions SET  question='$Q4', answer='$A4' where id='$id4' ");
  }

  $Q5 = $_POST['Q5'];
  $A5 = $_POST['A5'];
  $id5 = $_POST['id5'];
  if ($Q5 != $conditions5['question'] || $A5 != $conditions5['answer']) {
    $update = mysqli_query($connection, "UPDATE conditions SET  question='$Q5', answer='$A5' where id='$id5' ");
  }
  echo "<script> alert('Successfully Edited') </script>";
  echo "<script type='text/javascript'>window.location.href='condition_manager.php';</script>";
}
$connection->close();
?>