<?php


namespace App\Order\Application;


use App\Order\Domain\ValueObject\DateTimeVO;

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
     * @var DateTimeVO
     */
    private DateTimeVO $dateTime;


    /**
     * MakeAppointmentCommand constructor.
     * @param string $id
     * @param string $customer
     * @param string $workplace
     * @param DateTimeVO $dateTime
     */
    public function __construct(string $id, string $customer, string $workplace, string $dateTime)
    {

        $this->id = $id;
        $this->customer = $customer;
        $this->workplace = $workplace;
        $this->dateTime = new DateTimeVO($dateTime);
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
     * @return DateTimeVO
     */
    public function getDateTime(): DateTimeVO
    {
        return $this->dateTime;
    }

}
