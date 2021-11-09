<?php
session_start();
include "../config.php";
unset($_SESSION['username']);
unset($_SESSION['password']);
?>
<script>document.location="<?php echo BaseURL() ?>";</script>