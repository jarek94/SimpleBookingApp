<?php


namespace App\Order\Application;


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
     * @var string
     */
    private string $dateTime;


    /**
     * MakeAppointmentCommand constructor.
     * @param string $id
     * @param string $customer
     * @param string $workplace
     * @param string $dateTime
     */
    public function __construct(string $id, string $customer, string $workplace, string $dateTime)
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
     * @return string
     */
    public function getDateTime(): string
    {
        return $this->dateTime;
    }

}
