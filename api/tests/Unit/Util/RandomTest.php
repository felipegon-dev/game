<?php

namespace Tests\Unit\Http\Services;

use App\Util\Random;
use PHPUnit\Framework\TestCase;

class RandomTest extends TestCase
{
    /**
     * @var array
     */
    protected $config;

    public function testGetRandomList()
    {
        $list = Random::getRandomList(1, 10, 2, [2, 3, 1]);
        $this->assertNotContains(2, $list);
        $this->assertNotContains(3, $list);
        $this->assertNotContains(1, $list);
        $this->assertEquals(2, count($list));

    }

}
