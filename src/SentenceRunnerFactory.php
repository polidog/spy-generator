<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use Helicon\ObjectTypeParser\Parser;
use Polidog\SpyGenerator\Sentence\ClassName;
use Polidog\SpyGenerator\Sentence\CreateObjectMethod;
use Polidog\SpyGenerator\Sentence\SetUpMethod;
use Polidog\SpyGenerator\Sentence\TestMethods;
use Polidog\SpyGenerator\Sentence\UseSentence;

class SentenceRunnerFactory
{
    public function newRunner(): SentenceRunner
    {
        $runner = new SentenceRunner();
        $runner->add(new ClassName());
        $runner->add(new SetUpMethod(new Parser()));
        $runner->add(new UseSentence());
        $runner->add(new TestMethods());
        $runner->add(new CreateObjectMethod());

        return $runner;
    }
}
