<?php

namespace App\Order\Domain;

use Doctrine\Common\Collections\ArrayCollection;

class Workplace
{
    /**
     * @var int
     */
    private int $id;

    private $appointments;

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
