<?php

namespace App\Http\Services;


interface ConfigInterface
{
    public function getFilledBoard(): int;
    public function getBoardItems(): int;
    public function getPlayers(): array;
    public function getStartPlayer(): string;
}