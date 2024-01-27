<?php

namespace App\Services;

use App\Models\Week;
use App\Services\ReturnDates;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CreateAllTexts
{
    public static function getData($date)
    {
        $allTexts = [];
        for ($i = 8; $i <= 8 * 24 + 7; $i++) {
            array_push($allTexts, "");
        } 
        if ($date == false) {
            $date =  date("Y-m-d");
        }
        
        $weekInstance = Week::all();

        if (Auth::check()) {
            $weekInstance = User::where('id', Auth::id())->first()->weeks->all();
        }
        
        foreach ($weekInstance as $week) {
            $continueLoop = true;
            
            foreach (ReturnDates::returnDates($date) as $dateVar) {
                if ($dateVar == $week->date) {
                    $continueLoop = false;
                }
            }

            //dd([$continueLoop, ReturnDates::returnDates($date), $week->date]);
            if ($continueLoop) {
                continue;
            }

            for ($i = 8; $i <= 8 * 24 + 7; $i++) {
                $search_i = (($week->time - 1) * 8 + $week->day) + 8;
                if ($search_i == $i) {
                    $allTexts[$i - 8] = $week->text;
                    break;
                } 
            }        
        }
        return $allTexts;
    }
}

?>