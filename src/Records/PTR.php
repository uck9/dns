<?php

namespace Spatie\Dns\Records;

/**
 * @method string ip()
 */
class PTR extends Record
{
    protected string $ptr;

    public static function parse(string $line): ?self
    {
        $attributes = static::lineToArray($line, 5);
        print_r($attributes);
        if (count($attributes) < 5) {
            return null;
        }

        return static::make([
            'host' => $attributes[0],
            'ttl' => $attributes[1],
            'class' => $attributes[2],
            'type' => $attributes[3],
            'ptr' => $attributes[4],
        ]);
    }

    public function __toString(): string
    {
        return "{$this->host}.\t\t{$this->ttl}\t{$this->class}\t{$this->type}\t{$this->ptr}";
    }

    public function toArray()
    {
        return [
            'host' => $this->host,
            'ttl' => $this->ttl,
            'class' => $this->class,
            'type' => $this->type,
            'ptr' => $this->ptr,
        ];
    }
}
