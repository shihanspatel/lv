<?php
session_start(); 
unset($_SESSION['username']);
?>
<script>
    window.location.href="index.php";
</script>