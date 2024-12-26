<?php

namespace TaskRestApi\Domain\Model;

class Task
{
    private int|null $id;
    private string $description;
    private string $tags;
    private int $status;

    public function __construct(int|null $id, string $description, string $tags, int $status)
    {
        $this->id = $id;
        $this->description = $description;
        $this->tags = $tags;
        $this->status = $status;
    }

    public function id(): int|null
    {
        return $this->id;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function tags(): string
    {
        return $this->tags;
    }

    public function status(): string
    {
        return $this->status;
    }
}
