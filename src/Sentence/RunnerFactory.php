<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Helicon\ObjectTypeParser\Parser;

class RunnerFactory
{
    public function newRunner(): Runner
    {
        $runner = new Runner();
        $runner->add(new ClassName());
        $runner->add(new SetUpMethod(new Parser()));
        $runner->add(new UseSentence());
        $runner->add(new TestMethods());

        return $runner;
    }
}
