<?php

namespace App\Http\Services;

use App\Models\Board;
use App\Models\Player;


class RulesService implements RulesInterface
{

    /**
     * @param Board $currentBoard
     * @param Player $player
     * @param int $position
     */
    public function validateMove(Board $currentBoard, Player $nextPlayer, int $position): void
    {
        // TODO

    }
}