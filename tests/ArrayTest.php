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
        $input          = [[1], [2], [3]];
        $expectedResult = [1, 2, 3];
        $this->assertEquals($expectedResult, Arrays::flatten($input));
    }

    public function testFlattenWithGlue()
    {
        $input = [
            'book'         => 'Dune',
            'housePlanets' => [
                'Atreides'  => 'Caladan',
                'Harkonnen' => 'Giedi Prime',
            ],
            'houses'       => [
                [
                    'name'       => 'Atreides',
                    'homePlanet' => 'Caladan',
                    'leader'     => 'Duke Leto',
                ],
                [
                    'name'       => 'Harkonnen',
                    'homePlanet' => 'Geidi Prime',
                    'leader'     => 'Baron',
                ]
            ],
            'rating'       => '*****',
        ];

        $expectedResult = [
            'book'                   => 'Dune',
            'housePlanets.Atreides'  => 'Caladan',
            'housePlanets.Harkonnen' => 'Giedi Prime',
            'houses.0.name'          => 'Atreides',
            'houses.0.homePlanet'    => 'Caladan',
            'houses.0.leader'        => 'Duke Leto',
            'houses.1.name'          => 'Harkonnen',
            'houses.1.homePlanet'    => 'Geidi Prime',
            'houses.1.leader'        => 'Baron',
            'rating'                 => '*****',
        ];
        $this->assertEquals($expectedResult, Arrays::flatten($input, '.'));
    }

    public function testIntersectKeyRecursive()
    {
        $array1 = [
            'book'         => 'Dune',
            'housePlanets' => [
                'Atreides'  => 'Caladan',
                'Harkonnen' => 'Giedi Prime',
            ],
            'rating'       => '*****',
        ];

        $array2 = [
            'book'         => null,
            'housePlanets' => [
                'Harkonnen' => null,
            ]
        ];

        $expectedResult = [
            'book'         => 'Dune',
            'housePlanets' => [
                'Harkonnen' => 'Giedi Prime',
            ],
        ];

        $this->assertEquals($expectedResult, Arrays::intersectKeyRecursive($array1, $array2));
    }
}
