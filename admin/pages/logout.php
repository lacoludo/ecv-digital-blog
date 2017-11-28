<?php
    unset($_SESSION['admin']);
    session_destroy();
    echo"<script>window.location.replace(\"../index.php?page=home\");</script>";