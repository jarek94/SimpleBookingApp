<?php


namespace App\Saloon\Domain;

class Hairdresser
{
    /**
     * @var string
     */
    private string $id;
    /**
     * @var string
     */
    private string $firstName;
    /**
     * @var string
     */
    private string $lastName;
    /**
     * @var int
     */
    private int $defaultWorkplace;

    /**
     * Hairdresser constructor.
     * @param string $id
     * @param string $firstName
     * @param string $lastName
     * @param int $defaultWorkplace
     */
    public function __construct(string  $id, string $firstName, string $lastName, int $defaultWorkplace)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->defaultWorkplace = $defaultWorkplace;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return int
     */
    public function getDefaultWorkplace(): int
    {
        return $this->defaultWorkplace;
    }

    public function __toString(): string
    {
        return $this->getId();
    }



}
