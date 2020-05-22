# MOJ Utility Classes

## Introduction
Some lightweight utility classes to plug missing basic functions in php

## Arrays
```php
use MOJ\Utils\Arrays;
```

### Rename Array keys
```php
$input = ['foo', 'bar'];
$renamedArray = Arrays::rename(['foo' => 'hello', 'bar' => 'world'])
// returns $renamedArray = ['hello', 'world']
```

### Flatten Array
```php
$input = [[0],[1],[2]];
$flattenedArray = Arrays::flatten($input);
// returns $flattenedArray = [0, 1, 2];
```

## Flatten Array with glue
```php
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
$flattendArray = Arrays::flatten($input, '.');
// returns $flattenedArray = [
//            'book'                   => 'Dune',
//            'housePlanets.Atreides'  => 'Caladan',
//            'housePlanets.Harkonnen' => 'Giedi Prime',
//            'houses.0.name'          => 'Atreides',
//            'houses.0.homePlanet'    => 'Caladan',
//            'houses.0.leader'        => 'Duke Leto',
//            'houses.1.name'          => 'Harkonnen',
//            'houses.1.homePlanet'    => 'Geidi Prime',
//            'houses.1.leader'        => 'Baron',
//            'rating'                 => '*****',
//        ];
```

