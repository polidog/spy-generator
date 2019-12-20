<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use Helicon\ObjectTypeParser\Parser;
use Polidog\SpyGenerator\ClassSpyGenerator;
use Polidog\SpyGenerator\Code\ClassCodeFactory;
use Polidog\SpyGenerator\RunnerFactory;
use Polidog\SpyGenerator\Sample\User;

$runner = (new RunnerFactory())->newRunner();
$classCodeFactory = new ClassCodeFactory(new Parser());

$generator = new ClassSpyGenerator($runner, $classCodeFactory);
$code = $generator->generate(User::class);
echo $code;
