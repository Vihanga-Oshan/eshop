<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />
    <script>window.onscroll = function() {scrollFunction()};</script>
    
</html>

</head>

<body >
<div id="navbar"  >
  <a href="#default" id="logo">
        <?php

        session_start();

        if (isset($_SESSION["u"])) {

            $data = $_SESSION["u"];

        ?>

            <span class="text-lg-start "><b>Welcome </b><?php echo $data["fname"]; ?></span> |
            <span class="text-lg-start fw-bold signout" onclick="signout();">Sign Out</span> 

        <?php

        } else {

        ?>

            <a style="background-color:inherit;" href="index.php" class="text-decoration-none fw-bold">Sign In or Register</a>

        <?php

        }

?></a>

<div id="navbar-right" class="dropdown  d-lg-none d-md-none d-block ">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>

  <div id="navbar-right" class="d-lg-block d-md-block d-none " >
    <a class="blueline" href="home.php">Home</a>
    <a class="blueline" onclick="closeNav2()" href="cart.php">Cart</a>
    <a class="blueline" onclick="closeNav2()" href="userProfile.php">My profile</a>
    <a class="blueline" onclick="closeNav2()" href="watchlist.php">Watchlist</a>
    <a class="blueline" onclick="closeNav2()" href="sellingHistory.php">History</a>
    
    
    <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn btn btn-light" onclick="closeNav()">&times;</a>
    <div class="overlay-content"><ul>
    <a style="background-color:inherit;" href="#"><li class="aa " >About</li></a>
    <a style="background-color:inherit;" href="#"><li class="aa" >Services</li></a>
    <a style="background-color:inherit;" href="#"><li class="aa" >Clients</li></a>
    <a style="background-color:inherit;" href="#"><li class="aa" >Contact Us</li></a>
    </ul>
    </div>
    </div>
    <a class="aa blueline" href="#about"  onclick="openNav(),closeNav2()">Help</a>
  </div>

  

</div>





  



<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="script.js"></script>
<script src="bootstrap.js"></script>
</body>
</html>