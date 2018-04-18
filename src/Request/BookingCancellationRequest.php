<?php


namespace SalmaAbdelhady\RoomsXML\Request;


class BookingCancellationRequest extends AbstractRequest
{
    public $rules      = [
        'BookingId'   => 'string',
        'CommitLevel' => 'string',
    ];
    public $attributes = [
        'BookingId',
        'CommitLevel',
    ];

    /**
     * @var
     */
    private $BookingId;


    /**
     * @var
     */
    private $CommitLevel;

    /**
     * @return mixed
     */
    public function getBookingId()
    {
        return $this->BookingId;
    }

    /**
     * @param mixed $BookingId
     */
    public function setBookingId($BookingId)
    {
        $this->BookingId = $BookingId;
    }

    /**
     * @return mixed
     */
    public function getCommitLevel()
    {
        return $this->CommitLevel;
    }

    /**
     * @param mixed $CommitLevel
     */
    public function setCommitLevel($CommitLevel)
    {
        $this->CommitLevel = $CommitLevel;
    }
}