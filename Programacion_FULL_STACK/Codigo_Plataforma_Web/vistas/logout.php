<?php
session_start();
session_unset();
session_destroy();
header("Location: ../vistas/indexLogin.html?logout=true");
exit();
?>