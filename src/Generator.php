<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

interface Generator
{
    public function generate(string $className): string;
}
