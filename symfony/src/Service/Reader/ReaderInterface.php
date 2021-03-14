<?php

namespace App\Service\Reader;

interface ReaderInterface
{
    public function read(string $path);
}