<?php

namespace App\Util;

class Random
{
    /**
     * @param int $randInit
     * @param int $randEnd
     * @param int $repeat
     * @param $excluded
     * @return array
     */
    public static function getRandomList(int $randInit, int $randEnd, int $repeat, $excluded): array
    {
        $result = [];
        for ($i=0; $i < $repeat;) {
            $randNumber = rand($randInit, $randEnd);
            if (array_search($randNumber, $result) === false && array_search($randNumber, $excluded) === false) {
                $i++;
                $result[] = $randNumber;
            }

        }

        return $result;
    }
}
