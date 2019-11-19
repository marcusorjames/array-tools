<?php

namespace MOJ\Utils;

use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    public function testRename()
    {
        $map            = [
            'apples'  => 'pears',
            'bananas' => 'oranges',
        ];
        $data           = [
            'apples'  => 1,
            'bananas' => 2,
            'oranges' => 3,
            'lemons'  => 4,
        ];
        $expectedResult = [
            'pears'   => 1,
            'oranges' => 3,
            'lemons'  => 4,
        ];

        $this->assertEquals($expectedResult, Arrays::rename($map, $data));
    }

    public function testFlatten()
    {
        $input = [[1],[2],[3]];
        $expectedResult = [1,2,3];
        $this->assertEquals($expectedResult, Arrays::flatten($input));
    }
}
