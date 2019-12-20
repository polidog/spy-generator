<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use Helicon\ObjectTypeParser\Parser;
use Polidog\SpyGenerator\Sentence\ClassName;
use Polidog\SpyGenerator\Sentence\CreateObjectMethod;
use Polidog\SpyGenerator\Sentence\SetUpMethod;
use Polidog\SpyGenerator\Sentence\TestMethod\MethodName;
use Polidog\SpyGenerator\Sentence\TestMethod\MethodReturnValue;
use Polidog\SpyGenerator\Sentence\TestMethods;
use Polidog\SpyGenerator\Sentence\UseSentence;

class RunnerFactory
{
    public function newRunner(): SentenceRunner
    {
        $methodRunner = new SentenceMethodRunner();
        $methodRunner->add(new MethodName());
        $methodRunner->add(new MethodReturnValue());

        $runner = new SentenceRunner();
        $runner->add(new ClassName());
        $runner->add(new SetUpMethod(new Parser()));
        $runner->add(new UseSentence());
        $runner->add(new TestMethods($methodRunner));
        $runner->add(new CreateObjectMethod());

        return $runner;
    }
}
