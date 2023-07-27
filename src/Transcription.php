<?php

namespace Laracasts\Transcriptions;

class Transcription
{
    /**
     * Transcription constructor.
     * @param array $lines
     */
    public function __construct(protected array $lines)
    {
        $this->lines = $this->discardInvalidLines(array_map('trim', $lines));
    }

    public static function load (string $path): self
    {
        $lines = file($path);

        return new static($lines);
    }

    public function lines(): Lines
    {
        return new Lines(array_map(
            fn($line) => new Line(...$line),
            array_chunk($this->lines, 3)
        ));
    }

    protected function discardInvalidLines(array $lines): array
    {
        return array_slice(array_filter($lines), 1);
    }

    public function __toString()
    {
        return implode("\n", $this->lines);
    }

}