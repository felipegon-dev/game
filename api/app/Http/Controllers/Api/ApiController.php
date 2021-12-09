<?php

namespace App\Http\Controllers\Api;

use App\Http\Services\BoardService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var BoardService
     */
    private $boardService;

    /**
     * ApiController constructor.
     * @param BoardService $boardService
     */
    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;
    }


    /**
     * @param Request $request
     * @throws \App\Exceptions\InvalidParameterException
     */
    public function startGame(Request $request)
    {
        $board = $this->boardService->getBoardStart();
        // TODO: serialize board and return
    }

    /**
     * @param Request $request
     */
    public function nextMove(Request $request)
    {
        // TODO convert request in models with assembler(factory) and set params to nextMove
        // $this->boardService->nextMove();
        $board = $this->boardService->getBoard();
        // serialize $board and return
    }
}
