<?php

declare(strict_types=1);
require 'vendor/autoload.php';

use Polidog\SpyGenerator\ClassSpyGenerator;
use Polidog\SpyGenerator\Sample\User;

$generator = new ClassSpyGenerator();
$code = $generator->generate(User::class);
var_dump($code);
