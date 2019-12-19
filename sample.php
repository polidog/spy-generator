<?php

declare(strict_types=1);
require 'vendor/autoload.php';

use Polidog\SpyGenerator\Sample\User;
use Polidog\SpyGenerator\TestClassGenerator;

$generator = new TestClassGenerator();
$code = $generator->generate(User::class);
var_dump($code);
