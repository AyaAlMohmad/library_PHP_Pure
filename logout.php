<?php
require_once 'user.php';
User::logout();
header('Location: login_form.php');