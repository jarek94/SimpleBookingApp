<?php


namespace App\CRUD\Calendar;

use Carbon\Carbon;

class Calendar
{
    /** return $days from now */
    public function calendar(int $days)
    {
        $date = [];

        for ($i = 0; $i < $days; $i++) {

            for ($j = 1; $j < 48; $j++) {

                $hours = Carbon::today()->addMinutes($j * 30);

                if ($i == 0 and $hours->hour < Carbon::now()->hour)
                    continue;

                if (($hours->hour) >= 8 && ($hours->hour) < 20) {
                    $date[Carbon::today()->addDay($i)->format('Y-m-d')][$hours->format('H:i')]=1;;
                }
            }
        }

        return $date;

    }


}

