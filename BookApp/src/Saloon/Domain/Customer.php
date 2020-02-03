<?php


namespace App\Saloon\Domain;


class Customer
{
    /**
     * @var string
     */
    private string $id;
    /**
     * @var string
     */
    private ?string $firstName;
    /**
     * @var string
     */
    private ?string $lastName;
    /**
     * @var string
     */
    private string $email;

    /**
     * Customer constructor.
     * @param string $id
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function __construct(string $id, ?string $firstName, ?string $lastName, string $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->getId();
    }


}
