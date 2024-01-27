<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Week;
use App\Services\CreateAllTexts;

class MainController extends Controller
{
    public function show(): View
    {
        if (isset(request()->date)) {
            $allTexts = CreateAllTexts::getData(request()->date);
            return view('main_date', ['viewData' => $allTexts, 'selDate' => request()->date]);
        }
        $allTexts = CreateAllTexts::getData(false);
        return view('main', ['viewData' => $allTexts]);
    }
}
