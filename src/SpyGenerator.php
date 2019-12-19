<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

interface SpyGenerator
{
    public function generate(string $className): string;
}
