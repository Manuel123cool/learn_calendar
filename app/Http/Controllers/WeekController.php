<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Week;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class WeekController extends Controller
{
    public function store()
    {
        if (request()->isJson()) {
            $data = request()->json()->all();

            //check if date already exists
            if (Auth::check()) {
                $first = User::where('id', Auth::id())->first()->weeks->
                    where('day', $data["column"])->
                    where('time', $data["raw"])->
                    where('date', $data["date"])->
                    first();
            } else {
                $first = Week::where('day', $data["column"])->
                    where('time', $data["raw"])->
                    where('date', $data["date"])->
                    first();
            }

            if (isset($first)) {
                $first->text = $data["text"];

                $first->save();

            } else {
                //store when user is logged in 
            
                $week = new Week();;
                
                $week->day = $data["column"];
                $week->time = $data["raw"];
                $week->text = $data["text"];
                $week->date = $data["date"];

                if (Auth::check()) {
                    User::where('id', Auth::id())->first()->weeks()->save($week);
                } else {
                    $week->save();
                }
            }
            return response('Hello World', 200)
                    ->header('Content-Type', 'text/plain');
        }

        return response('Not a JSON request', 400);
    }

    public function delete()
    {
        if (request()->isJson()) {
            $data = request()->json()->all();

            //check if date already exists
            $first = Week::where('day', $data["column"])->
                where('time', $data["raw"])->
                where('date', $data["date"])->
                first();

            if (isset($first)) {
                $first->delete();
            } 

            return response('Hello World', 200)
                    ->header('Content-Type', 'text/plain');
        }

        return response('Not a JSON request', 400);
    }
}
