<?php
session_start();
session_unset();
session_destroy();
header("Location: http://localhost/progetto-s5-l5-php/");
exit;

?>