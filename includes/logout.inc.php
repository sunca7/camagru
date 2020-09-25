<?php

session_start();
session_unset();  //destroy session
session_destroy();
header("Location: /index.php");