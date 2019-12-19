<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Code;

class Properties
{
    /**
     * @var string[]
     */
    private $properties = [];

    public function add(string $propertyName, string $className): void
    {
        if (class_exists($className)) {
            $this->properties[$propertyName] = $className;
        }
    }

    public function prophesizeCode(): string
    {
        $codes = [];
        foreach ($this->properties as $property => $class) {
            $class = new \ReflectionClass($class);
            $codes[] = sprintf('$this->%s = $this->prophesize(%s)', $property, $class->getShortName().'::class');
        }

        return implode("\n", $codes);
    }

    public function createObject(\ReflectionClass $reflectionClass)
    {
        $codes = [];
        foreach ($this->properties as $property => $class) {
            $codes[$property] = sprintf('$this->%s->reveal()', $property);
        }

        $constractors = $reflectionClass->getConstructor();
        var_dump($codes);
    }
}
