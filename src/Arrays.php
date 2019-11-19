<?php

namespace MOJ\Utils;

class Arrays
{
    public static function rename(array $map, array $data): array
    {
        return array_combine(
            array_map(
                function ($el) use ($map) {
                    return isset($map[$el]) ? $map[$el] : $el;
                },
                array_keys($data)
            ),
            array_values($data)
        );
    }

    public static function flatten(array $array): array
    {
        $flatten = [];
        array_walk_recursive($array, function ($value) use (&$flatten) {
            $flatten[] = $value;
        });
        return $flatten;
    }
}
