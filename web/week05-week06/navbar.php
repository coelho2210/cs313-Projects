<?php

if (isset($_SESSION['username'])) {
  ?>
    <h1> My Rating Park - Webpage</h1>
    <ul class='nav'>
    <li class='nav'><a href='home.php' class='nav'>About this Project</a></li>
    <li class='nav'><a href='index.php' class='nav'>My Browser</a></li>
    <li class='nav'><a href='signOut.php' class='nav'> Sign Out</a></li>
    </ul>
  <?php
} else {

echo "<ul class='nav'>";
echo"<li class='nav'><a href='login.php' class='nav'> Login</a></li>";
echo"<li class='nav'><a href='sign_up.php' class='nav'> Sign Up</a></li>";
echo"</ul>";

}
?>





