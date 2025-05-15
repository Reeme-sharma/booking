<div>
    <table class="w-full mt-4 border">
        <thead>
            <tr>
                <th class="border p-2">S.No</th>
                <th class="border p-2">Week</th>
                <th class="border p-2">Shift</th>
                <th class="border p-2">Start From</th>
                <th class="border p-2">End From</th>
                <th class="border p-2">Maximum Booking</th>
                <th class="border p-2">Today Schedule</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todayschedule as $info)
                <tr>
                    <td class="border p-2">{{ $loop->iteration }}</td>
                    <td class="border p-2">{{ $info['week'] }}</td>
                    <td class="border p-2">{{ $info['shift'] }}</td>
                    <td class="border p-2">{{ $info['start_from'] }}</td>
                    <td class="border p-2">{{ $info['end_from'] }}</td>
                    <td class="border p-2">{{ $info['max_appointment'] }}</td>
                    <td class="border p-2">

                        @php
                            $istodayschedule = false;
                            $tdsid = null;
                            $tds = $info->is_today_schedule->toArray();
                            foreach($tds as $tdinfo)
                            {
                                if($tdinfo['todaydate']== date('Y-m-d'))
                                {
                                    $tdsid = $tdinfo['id'];
                                  $istodayschedule = true;
                                  break;
                                }
                            }
                        @endphp

                    <!-- <div class="form-check form-switch"> -->
                    <input class="form-check-input" type="checkbox" id="switch-{{ $info['id'] }}"
                     wire:click="{{ $istodayschedule ? 'delete('.$tdsid.')' : 'store('.$info->id.')' }}"
                     {{ $istodayschedule ? 'checked' : '' }}>
                    <!-- </div> -->
                    </td>
                </tr>
            @endforeach
            @if (!count($todayschedule))
                <tr>
                    <th colspan="7" class="text-muted text-center p-4">No Data Available</th>
                </tr>
            @endif
        </tbody>
    </table>
</div>

