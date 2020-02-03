<?php

namespace App\Saloon\Domain;

class Appointment
{
    private string $id;

    private Workplace $workplace;

    private ?string $hairdresser;
    /**
     * @var \DateTime
     */
    private \DateTime $dateTime;
    /**
     * @var Customer
     */
    private Customer $customer;


    /**
     * Appointment constructor.
     * @param string $id
     * @param Workplace $workplace
     * @param Customer $customer
     * @param \DateTime $dateTime
     * @param Hairdresser $hairdresser
     */
    public function __construct(string $id, Workplace $workplace, Customer $customer,  \DateTime $dateTime,  ?Hairdresser $hairdresser)
    {
        $this->id = $id;
        $this->workplace = $workplace;
        $this->hairdresser = $hairdresser;
        $this->dateTime = $dateTime;
        $this->customer = $customer;
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
    public function getWorkplace(): Workplace
    {
        return $this->workplace;
    }

    /**
     * @return string
     */
    public function getHairdresser(): ?Hairdresser
    {
        return $this->hairdresser;
    }

    /**
     * @return string
     */
    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }










}
