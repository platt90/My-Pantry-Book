<?php
if (isset($_COOKIE["idUser"])) {
    setcookie("idUser", " ", time() - 60);
}

// Redirect to home page
header('Location: index.php?');

?>