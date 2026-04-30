<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', sans-serif;
}

body {
  background-image: url("Screenshot (64).png");
  color: #333;
  line-height: 1.6;
}
</style>
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
