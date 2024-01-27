<?php

namespace App\Services;

class ReturnDates
{
    public static function getWeekday($dateInside) {
        return date('w', strtotime($dateInside));
    }

    public static function returnDates($date) {
        $weekDay = ReturnDates::getWeekday($date);

        if ($weekDay == 0) {
            $weekDay = 6;
        } else {
            $weekDay -= 1;
        }
        $weekDay += 1;

        $dateObj = date_create($date);

        $dateObj->modify("+1 days");

        //datum zum anfang der woche
        $dateObj->modify("-$weekDay days");

        $reDates = [];

        for ($i = 0; $i < 7; ++$i) {
            array_push($reDates,  date_format($dateObj,"Y-m-d"));
            $dateObj->modify("+1 days");
        }

        return $reDates;
    }
}