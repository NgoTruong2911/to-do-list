<?php

require '../vendor/autoload.php';
require_once '../app/config/config.php';


error_reporting(-1);
ini_set('display_errors', 'On');

use App\Libraries\Core;
new Core();
