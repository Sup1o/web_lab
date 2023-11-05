<?php
    // setcookie("cookie","",time()-3600);
    session_unset();
    session_destroy();
    header("Location: index.php?page=login");
    exit();
?>