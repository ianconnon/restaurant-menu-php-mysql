<?php

include('api/connection.php');

session_destroy();

header('Location: ./admin.php');