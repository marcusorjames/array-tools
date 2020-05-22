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
}
