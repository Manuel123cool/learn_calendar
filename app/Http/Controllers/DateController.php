<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\CreateAllTexts;

class DateController extends Controller
{
    public function change()
    {
        if (isset(request()->selDate)) {
            $allTexts = CreateAllTexts::getData(request()->selDate);
            return view('main_date', ['viewData' => $allTexts, 'selDate' => request()->selDate]);
        } else {
            return redirect('/');
        }
    }
}
