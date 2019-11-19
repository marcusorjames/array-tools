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

