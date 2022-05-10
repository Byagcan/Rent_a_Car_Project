<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/edit_manager.css" />
  <script src="https://unpkg.com/scrollreveal"></script>
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
              <li><a href="edit_manager.php">Edit</a></li>
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

  <!-- Edit -->
  <section id="edit">
    <div class="edit">
      <div class="edit-container anime-top">
        <div class="edit-row">
          <h1 style="
                color: white;
                text-align: center;
                font-size: 32px;
                margin-bottom: 8px;
                font-family: Raleway, sans-serif;
              ">
            EDIT
          </h1>
          <div class="image">
            <img src="../images/cl6.png" alt="" />
            <form action="addphoto.php" method="post" enctype="multipart/form-data">
              <input type="file" name="file" value="">
              <input type="submit" name="addphoto" value="Edit Photo">
            </form>
          </div>
          <div class="descriptiontext">
            <h4 style="color: white;">Description</h4>
            <textarea id="area" name="area" rows="4" cols="100"></textarea>
          </div>
          <div class="description">
            <div class="label">
              <div class="label">
                <label for="1">Brand :</label>
                <input type="text" id="1" />
              </div>
              <div class="label">
                <label for="3">Name :</label>
                <input type="text" id="3" />
              </div>
              <div class="label">
                <label for="2">Segment :</label>
                <input type="text" id="2" />
              </div>
              <div class="label">
                <label for="4">Daily Price :</label>
                <input type="text" id="4" />
              </div>
              <br />
              <div class="icon">
                <img src="../images/wgroup.png" alt="" />
                <input type="text" placeholder="Number Of Person" />
                <img src="../images/wpetrol.png" alt="" />
                <select name="edit" id="3">
                  <option value="diesel">Diesel</option>
                  <option value="fuel">Fuel</option>
                </select>
                <img src="../images/wsetting.png" alt="" />
                <select name="edit" id="3">
                  <option value="manuel">Manuel</option>
                  <option value="automatic">Automatic</option>
                </select>
              </div>
              <div class="submit">
                <form action="index_manager.php">
                  <input type="submit" value="Edit" />
                  <input type="submit" value="Delete" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</body>
<script>
  window.sr = ScrollReveal();
  sr.reveal(".anime-top", {
    origin: "top",
    duration: 1000,
    distance: "25rem",
    delay: 300,
  });
</script>

</html>