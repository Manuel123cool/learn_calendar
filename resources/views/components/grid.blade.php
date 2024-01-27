@props(['gridElements'])

<div class="grid-container" id="grid-container">
    <div class="grid-item">Uhrzeit</div>
    <div class="grid-item">Montag</div>
    <div class="grid-item">Dienstag</div>
    <div class="grid-item">Mitwoch</div>  
    <div class="grid-item">Donnerstag</div>
    <div class="grid-item">Freitag</div>
    <div class="grid-item">Samstag</div>  
    <div class="grid-item">Sonntag</div>
    
    @foreach($gridElements as $gridElem) 
      @if($gridElem["id"] % 8 != 0)
          <div class="grid-item inside-item" id="{{$gridElem['id']}}" onclick="clicked(event)">{{ $gridElem["string"] }}</div>
      @else 
          <div class="grid-item" id="{{$gridElem['id']}}" >{{ $gridElem["string"] }}</div>
      @endif
      
    @endforeach
</div>
  