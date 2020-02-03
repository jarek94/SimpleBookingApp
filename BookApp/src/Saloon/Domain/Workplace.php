<?php

namespace App\Saloon\Domain;

class Workplace
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var bool
     */
    private bool $availability;

    /**
     * Workplace constructor.
     * @param int $id
     * @param bool $availability
     */
    public function __construct(int $id, bool $availability)
    {
        $this->id = $id;
        $this->availability = $availability;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isAvailability(): bool
    {
        return $this->availability;
    }

    public function __toString(): string
    {
      return $this->getId();
    }


}
