<?php


namespace App\Order\Domain\ValueObject;


use App\Order\Domain\Exception\BadRequest;

/**
 * Class DateTimeVO
 * @package App\Order\Domain\ValueObject
 *
 * Prosta walidacja formatu daty.
 * Sprawdzana jest jej zgodność ze standardem ISO 8601
 */
class DateTimeVO
{
    /** @var int */
    private $dateTime;

    /**
     * 2020-02-27T23:18:50
     * ISO 8601
     */

    public function __construct(string $dateTime)
    {
        try {
            $date = new \DateTime($dateTime);
        }catch (\Exception $e){
            throw new BadRequest();
        }

        $this->dateTime = $date;
    }


    public function getValue(): \DateTime
    {
        return $this->dateTime;
    }

}
