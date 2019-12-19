<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use Polidog\SpyGenerator\Code\ClassCodeFactory;
use Polidog\SpyGenerator\Sentence\Runner;
use Zend\Code\Generator\ClassGenerator;

class ClassSpyGenerator implements SpyGenerator
{
    /**
     * @var Runner
     */
    private $runner;

    /**
     * @var ClassCodeFactory
     */
    private $classCodeFactory;

    public function __construct(Runner $runner, ClassCodeFactory $classCodeFactory)
    {
        $this->runner = $runner;
        $this->classCodeFactory = $classCodeFactory;
    }

    /**
     * @throws \ReflectionException
     */
    public function generate(string $className, ?string $namespace = null): string
    {
        $classGenerator = new ClassGenerator();
        $classGenerator->setNamespaceName($namespace);
        $classCode = ($this->classCodeFactory)($className);
        $this->runner->run($classGenerator, $classCode);

        return $classGenerator->generate();
    }
}
