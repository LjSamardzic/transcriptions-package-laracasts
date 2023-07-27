<?php

namespace Laracasts\Transcriptions;

use Traversable;

class Lines implements \Countable, \IteratorAggregate
{

    public function __construct(protected array $lines)
    {
    }

    public function asHtml(): string
    {
        $formattedLines = array_map(
            fn(Line $line) => $line->toAnchorTag(),
            $this->lines
        );

        return (new static($formattedLines))->__toString();
    }

    public function __toString()
    {
        return implode("\n", $this->lines);
    }

    public function count(): int
    {
        return count($this->lines);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->lines);
    }
}