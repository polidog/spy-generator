# polidog/spy-generator

This library is generate test code for phpunit.

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
use Polidog\SpyGenerator\RunnerFactory;

$runner = (new RunnerFactory())->newRunner();
$classCodeFactory = new ClassCodeFactory(new \Helicon\ObjectTypeParser\Parser());

$generator = new ClassSpyGenerator($runner, $classCodeFactory);
$code = $generator->generate(User::class);
echo $code;

/*
 Output code.
 $ php sample.php
   use Polidog\SpyGenerator\Sample\Data\Photo;
   use Polidog\SpyGenerator\Sample\Data\Profile;
   use Polidog\SpyGenerator\Sample\User;
   
   class UserTest extends \PHPUnit\Framework\TestCase
   {
   
       public function setUp() : void
       {
           $this->profile = $this->prophesize(Profile::class)
           $this->photo = $this->prophesize(Photo::class)
       }
   
       public function testGetDisplayName() : void
       {
       }
   
       public function testGetPhotoURL() : void
       {
       }
   
       private function createObject() : \Polidog\SpyGenerator\Sample\User
       {
           return new User($this->profile->reveal(),$this->photo->reveal());
       }
   
   
   }
 */
```
