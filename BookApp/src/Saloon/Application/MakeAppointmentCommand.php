<?php


namespace App\Saloon\Application;


class MakeAppointmentCommand
{
    /**
     * @var string
     */
    private string $id;
    /**
     * @var string
     */
    private string $customer;
    /**
     * @var string
     */
    private string $workplace;
    /**
     * @var \DateTime
     */
    private \DateTime $dateTime;


    /**
     * MakeAppointmentCommand constructor.
     * @param string $id
     * @param string $customer
     * @param string $workplace
     * @param \DateTime $dateTime
     */
    public function __construct(string $id, string $customer, string $workplace, \DateTime $dateTime)
    {

        $this->id = $id;
        $this->customer = $customer;
        $this->workplace = $workplace;
        $this->dateTime = $dateTime;
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
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @return string
     */
    public function getWorkplace(): string
    {
        return $this->workplace;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

}
