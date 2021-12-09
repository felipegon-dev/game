<?php

namespace App\Http\Services;

use App\Exceptions\InvalidParameterException;
use App\Models\Board;


interface BoardInterface
{

    /**
     * @param Board|null $board
     *
     * @throws InvalidParameterException
     */
    public function setBoard(?Board $board);
    /**
     * @return Board
     */
    public function getBoard(): Board;
    /**
     * @return Board
     *
     * @throws InvalidParameterException
     */
    public function getBoardStart(): Board;

    /**
     * @param $currentBoard
     * @param $player
     * @param $position
     */
    public function nextMove($currentBoard, $player, $position): void;
}