<?php

namespace App\Partials;

interface IdAwareInterface
{
    public function getId(): ?int;
    public function setId(int $id): self;
}