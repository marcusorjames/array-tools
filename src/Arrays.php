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

    public static function flatten(array $record, string $glue = null, $namespace = ''): array
    {
        $return = [];
        foreach ($record as $key => $value) {
            if (is_array($value)) {
                $return = array_merge(
                    $return,
                    self::flatten($value, $glue, is_null($glue) ?: $namespace . $key . $glue)
                );
            } else {
                $return[$namespace . $key] = $value;
            }
        }

        return $return;
    }

    public static function intersectKeyRecursive(array $array1, array $array2)
    {
        $array1 = array_intersect_key($array1, $array2);
        foreach ($array1 as $key => &$value) {
            if (is_array($value) && is_array($array2[ $key ])) {
                $value = self::intersectKeyRecursive($value, $array2[ $key ]);
            }
        }

        return $array1;
    }
}
