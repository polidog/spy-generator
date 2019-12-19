# polidog/spy-generator

This library is generate testspy code for phpunit.

## using

```shell script
$ composer req polidog/spy-generator
```


```php
<?php
// sample.php

declare(strict_types=1);

require '../vendor/autoload.php';

use Polidog\SpyGenerator\ClassSpyGenerator;
use Polidog\SpyGenerator\Code\ClassCodeFactory;
use Polidog\SpyGenerator\Sample\User;
use Polidog\SpyGenerator\SentenceRunnerFactory;

$runner = (new SentenceRunnerFactory())->newRunner();
$classCodeFactory = new ClassCodeFactory(new \Helicon\ObjectTypeParser\Parser());

$generator = new ClassSpyGenerator($runner, $classCodeFactory);
$code = $generator->generate(User::class);
echo $code;


```
