@extends('layouts.user')
@section('usersidebar')
    @include('layouts.usersidebar',[])
@endsection
@section('content')
<div class="row">
    <main class="col-md-9 content" id="content">
    <h4>Your Booking Details</h4>
    <div>
        <table class="w-100 mt-4 border">
           <thead class="text-center bg-light">
            <tr>
              <th class="border p-2">S.No</th>
              <th class="border p-2">Firm</th>
              <th class="border p-2">Week</th>
              <th class="border p-2">Shift</th>
              <th class="border p-2">Your Booking Time</th>
              <th class="border p-2">Your Booking Number</th>
              <th class="border p-2">Date</th>
              <th class="border p-2">Cancel</th>
         </tr>
         </thead>
         <tbody>
          @foreach ($data as $info)
            <tr>
              <td class="border p-2">{{ $loop->iteration }}</td>
              <td class="border p-2">{{ $info->todayschedule->schedule->firm->firm_name }}</td>
              <td class="border p-2">{{ $info->todayschedule->schedule->week }}</td>
              <td class="border p-2">{{ $info->todayschedule->schedule->shift }}</td>
              <td class="border p-2">{{ $info->time }}</td>
              <td class="border p-2">{{ $info->slotno }}</td>
              <td class="border p-2">{{ $info->date }}</td>
              <td class="border p-2">{{ (strtotime($info->date)>=strtotime(date(y-m-d))) ? "cancel" : "" }}</td>
         </tr>
            @endforeach 
          </tbody>
          </table>
         </div>                                        