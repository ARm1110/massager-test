<?php
//logout.php

session_start();

echo "Logout Successfully ";

session_destroy();

header("Location: ../../resource/loginform.php");
