<?php
session_start();
session_destroy();

setcookie("email", "", time() - 3600, "/");
