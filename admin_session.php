<?php

	session_start();
	if(empty($_SESSION["user"]))
  $_SESSION['user_id'] = $u_id;
?