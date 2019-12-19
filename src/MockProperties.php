<?php

declare(strict_types=1);

namespace Polidog\UnitTestGenerator;

class MockProperties
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

    public function generateMockCode(): string
    {
        $codes = [];
        foreach ($this->properties as $property => $class) {
            $class = new \ReflectionClass($class);
            $codes[] = sprintf('$this->%s = $this->prophesize(%s)', $property, $class->getShortName().'::class');
        }

        return implode("\n", $codes);
    }
}
