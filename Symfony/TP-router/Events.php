<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\ORM\Mapping as ORM;
class Events
{
    private int $id;
    private string $title;
    private string $location;
    private \DateTime $date;
    private bool $isPublic;

    public function __construct(
        int $id,
        string $title,
        string $location,
        \DateTime $date,
        bool $isPublic
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->location = $location;
        $this->date = $date;
        $this->isPublic = $isPublic;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    // Setters
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function setIsPublic(bool $isPublic): void
    {
        $this->isPublic = $isPublic;
    }
}
