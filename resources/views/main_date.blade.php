<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/main_date.js')}}"></script>
</head>
<body>

<div class="blockDiv">
<form id="send">
    <div id="selected"></div>
    <label for="lname">Text:</label><br>
    <input type="text" id="lname" name="lname"><br><br>
    <input type="submit" value="Submit">
</form> 


<button onclick="deleteRequest(event)">Eintrag löschen</button>

</div>

<div class="blockDiv">
<form action="/changeDate" method="POST">
    @csrf
    <label for="selDate">Datum angeben:</label>
    <input type="date" id="selDate" name="selDate" value="{{$selDate}}">
    <input type="submit">
</form>
</div>

<div class="blockDiv">
@include('includeFiles.auth')

@include('users.usersLinks')
</div>

<div class="blockDiv">
@include('includeFiles.changeWeek')
</div>

@php 
    $gridElements = [];
    for ($x = 8; $x <= 8 * 24 + 7; $x++) {
        if ($x % 8 == 0) {
            array_push($gridElements, ["string" => strval($x / 8) . " Uhr", "id" => $x]);
        } else {
            array_push($gridElements, ["string" => $viewData[$x - 8], "id" => $x]);
        }
    }

@endphp

<x-grid :gridElements="$gridElements"/>

</body>
</html>
