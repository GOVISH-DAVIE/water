@extends('layouts.app')

@section('content')
{{-- <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    }); --}}

  {{-- </script> --}}
  
<div class="container">
    <div id='calendar'></div>

 <div class="row">
    @foreach ($data as $item) 
 <div class='col-md-4'>
    <div class="card " style="padding: 5px" >
      <div class="row">
        <div class="col-sm-6">
          <img class="card-img-top" src="storage/{{$item->firstEntryimg }}"  alt="Card image cap">
       
        </div>
        <div class="col-sm-6">
          <img class="card-img-top" src="storage/{{$item->sectEntryimg }}"  alt="Card image cap">
       
        </div>
      </div>
        <div class="card-body">
          <h5 class="card-title">{{$item->dateref}}</h5>
          <p class="card-text">
              <b>
                  previous reading: {{$item->firstEntry}}
              </b>
              <br>
              <b>
                  current reading: {{$item->secEntry}}
              </b>
          </p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Total units Used<b>{{$item->total}}</b></li>
          <li class="list-group-item">const per unit <b>{{$item->cpu}}</b></li>
          <li class="list-group-item">Money Received: <b>{{$item->received}}</b> </li>
          <li class="list-group-item"> Expected Amount <b>{{$item->expected}}</b> </li>
        </ul> 
      </div>
 </div>
@endforeach
 </div>
</div>

@endsection