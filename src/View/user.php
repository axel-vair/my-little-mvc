<?php

use App\Model\User;

require_once "../../vendor/autoload.php";

$user = new User();
print_r($user->findOneById(1));

?>
