<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="manager_css/condition_manager.css" />
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
        <div class="wrapper">
          <button class="toggle">
            Rental Period :
            <img src="../images/plus.png" alt="" />
          </button>
          <div class="content">
            <div class="input">
              <input type="text" placeholder="The minimum rental period is 24 hours." />
            </div>
            <div class="button">
              <button>Edit</button>
            </div>
          </div>
        </div>
        <div class="wrapper">
          <button class="toggle">
            Driver's License and Age Lower Limit :
            <img src="../images/plus.png" alt="" />
          </button>
          <div class="content">
            <div class="input">
              <input type="text" placeholder="Lorem, ipsum dolor." />
            </div>
            <div class="button">
              <button>Edit</button>
            </div>
          </div>
        </div>
        <div class="wrapper">
          <button class="toggle">
            Traffic Fines:
            <img src="../images/plus.png" alt="" />
          </button>
          <div class="content">
            <div class="input">
              <input type="text" placeholder="Lorem, ipsum dolor." />
            </div>
            <div class="button">
              <button>Edit</button>
            </div>
          </div>
        </div>
        <div class="wrapper">
          <button class="toggle">
            Services and products that are excluded from car rental prices:
            <img src="../images/plus.png" alt="" />
          </button>
          <div class="content">
            <div class="input">
              <input type="text" placeholder="Lorem, ipsum dolor." />
            </div>
            <div class="button">
              <button>Edit</button>
            </div>
          </div>
        </div>
        <div class="wrapper">
          <button class="toggle">
            Booking Conditions:
            <img src="../images/plus.png" alt="" />
          </button>
          <div class="content">
            <div class="input">
              <input type="text" placeholder="Lorem, ipsum dolor." />
            </div>
            <div class="button">
              <button>Edit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Conditions Finish -->
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
  let toggles = document.getElementsByClassName("toggle");
  let contentDiv = document.getElementsByClassName("content");

  for (let i = 0; i < toggles.length; i++) {
    toggles[i].addEventListener("click", () => {
      if (
        parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight
      ) {
        contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
        toggles[i].style.color = "#0084e9";
        img[i].classList.remove("../images/plus.png");
        img[i].classList.add("../images/subs.png");
      } else {
        contentDiv[i].style.height = "0px";
        toggles[i].style.color = "#111130";
        img[i].classList.remove("../images/plus.png");
        img[i].classList.add("../images/subs.png");
      }

      for (let j = 0; j < contentDiv.length; j++) {
        if (j !== i) {
          contentDiv[j].style.height = "0px";
          toggles[j].style.color = "#111130";
          img[j].classList.remove("../images/subs.png");
          img[j].classList.add("../images/plus.png");
        }
      }
    });
  }
</script>

</html>