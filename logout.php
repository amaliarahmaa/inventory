<?php
session_start();
session_unset(); // Menghapus semua variabel session
session_destroy(); // Menghancurkan sesi
header("Location: formlogin.php"); // Redirect ke halaman login
exit;
?>
