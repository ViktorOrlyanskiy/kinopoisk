<?php

namespace App\Kernel\Http;

use App\Kernel\Validator\ValidatorInterface;

interface RequestInterface
{
    public static function createFromGlobals(): static;

    public function setValidator(ValidatorInterface $validator);

    public function getUri(): string;

    public function getMethod(): string;

    public function input(string $key, $default = null): mixed;

    public function validate(array $rules): bool;

    public function errors(): array;
}
