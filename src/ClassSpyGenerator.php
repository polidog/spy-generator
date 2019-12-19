<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use Polidog\SpyGenerator\Code\Ast;
use Polidog\SpyGenerator\Code\ClassCode;
use Polidog\SpyGenerator\Sentence\Runner;
use Zend\Code\Generator\ClassGenerator;

class ClassSpyGenerator implements SpyGenerator
{
    /**
     * @var Runner
     */
    private $runner;

    public function __construct(Runner $runner)
    {
        $this->runner = $runner;
    }

    public function generate(string $className, ?string $namespace = null): string
    {
        $classGenerator = new ClassGenerator();
        $classGenerator->setNamespaceName($namespace);

        $refClass = new \ReflectionClass($className);
        $code = file_get_contents($refClass->getFileName());
        $ast = new Ast($code);
        $classCode = new ClassCode($refClass, $ast);

        // generate code.
        $this->runner->run($classGenerator, $classCode);

        return $classGenerator->generate();
    }
}
