 @extends('layouts.user')
 @section('usersidebar')
     @include('layouts.usersidebar',[])
 @endsection
@section('content')
<div class="row">
     <main class="col-md-9  content" id="content">
     <h4>Available Firms</h4>
<div id="firmList">
 @php
    date_default_timezone_set('Asia/Kolkata');
 @endphp
 @foreach($data as $frmobj)
 @php 
 $frm= $frmobj->toArray();
 $frm= array_map(fn($val)=>ucwords(strtolower($val)),$frm); 
 @endphp

<div class="firm-card mb-4 p-3 shadow-sm">
  <div class="row">
    <div class="col-md-3 text-center order-{{ ($loop->iteration % 2 == 0) ? 2 : 1 }}" style="width:200px; margin-left:30px;">
     <img src="/image/{{ $frm['profilepic'] ? $frm['profilepic']:'not found.jpg' }}" class="img-thumbnail rounded shadow-sm" style="width: 160px; height: 160px; object-fit: cover;">
    </div>
    <div class="col-md-9 order-{{ ($loop->iteration % 2 == 0) ? 1 : 2 }}" >
    <div><b class="h4">{{ ucfirst($frm['firm_name']) }}</b><span class="h6 text-muted">  ({{ !empty($frm['category']) ? $frm['category'] . ', ' : '' }} Since: {{ date('Y',strtotime($frm['since'])) }})</span>&nbsp;&nbsp;<a class="btn btn-warning btn-sm" href="tel:+91{{ $frm['firm_mobile'] }}">Call Now</a>
    <div class="text-primary mt-2">{{ $frm['street'] }}, {{ $frm['landmark'] }}</div>
    <p class="mb-1">
        +91 {{ $frm['firm_mobile'] }}, {{ $frm['address'] }},
        {{ $frm['city'] }} - {{ $frm['pincode'] }},
        {{ $frm['state'] }}, {{ $frm['country'] }}
    </p>
    <p class="text-muted"><strong>About Us:</strong> {{ $frm['about_us'] }}</p>
    <div>
      <table class="w-100 mt-4 border">
      <thead class="text-center bg-light">
      <tr>
        <th class="border p-2">S.No</th>
        <th class="border p-2">Week</th>
        <th class="border p-2">Shift</th>
        <th class="border p-2">Start From</th>
        <th class="border p-2">End From</th>
        <th class="border p-2">Maximum Booking</th>
        <th class="border p-2">Remaining</th>
        <th class="border p-2">Book</th>
      </tr>
      </thead>
      <tbody>
    @php
      $istodayschedule = false;
    @endphp
    @foreach ($frmobj->todayschedule as $info)
    @if($info['todaydate']==date('Y-m-d'))
    @php
       $istodayschedule = true;
    @endphp
      <tr>
        <td class="border p-2">{{ $loop->iteration }}</td>
        <td class="border p-2">{{ $info['week'] }}</td>
        <td class="border p-2">{{ $info['shift'] }}</td>
        <td class="border p-2">{{ $info->schedule['start_from'] }}</td>
        <td class="border p-2">{{ $info->schedule['end_from'] }}</td>
        <td class="border p-2">{{ $info->schedule['max_appointment'] }}</td>
        <td class="border p-2">
          {{ date('H:i A') }}
          <input type="time" min="{{ date('H:i')}}">
        </td>
        <td class="border p-2">
        <button class="btn btn-primary btn-sm">Book Appointment</button>
        </td>
      </tr>
     @endif
     @endforeach
     @if (!count($frmobj->todayschedule) || !$istodayschedule)
         <tr>
             <th colspan="7" class="text-muted text-center p-4">Today Schedule is not Available</th>
         </tr>
     @endif
        </tbody>
         </table>
         </div>
         </div>
         </div>   
         </div>
         </div>
     @endforeach
        </div>
        </main>
        </div>
@endsection 

       