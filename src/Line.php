<?php


namespace Laracasts\Transcriptions;


class Line
{

    protected int $position;
    protected string $timestamp;
    protected string $body;

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    public function __construct(int $position, string $timestamp, string $body)
    {
        $this->position = $position;
        $this->timestamp = $timestamp;
        $this->body = $body;
    }

    public function toAnchorTag(): string
    {
        return sprintf('<a href="?time=%s">%s</a>', $this->beginningTimestamp(), $this->getBody());
    }

    /**
     * @return string
     */
    public function beginningTimestamp(): string
    {
        preg_match('/^\d{2}:(\d{2}:\d{2})\.\d{3}/', $this->getTimestamp(), $matches);

        return $matches[1];
    }

}