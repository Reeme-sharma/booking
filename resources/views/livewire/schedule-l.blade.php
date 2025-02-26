<div class="container mx-auto p-4">
    <button wire:click="create" class="btn btn-primary text-white px-4 py-2">Create Schedule</button>

    @if (session()->has('message'))
        <div class="mt-2 p-2 bg-green-500 text-white">
            {{ session('message') }}
        </div>
    @endif
    @if (!$isModalOpen)
        <table class="w-full mt-4 border">
            <thead>
                <tr>
                    <th class="border p-2">S.No</th>
                    <th class="border p-2">Week</th>
                    <th class="border p-2">Shift</th>
                    <th class="border p-2">Start From</th>
                    <th class="border p-2">End From</th>
                    <th class="border p-2">Maximum Booking</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allschedule as $info)
                    <tr>
                        <td class="border p-2">{{ $loop->iteration }}</td>
                        <td class="border p-2">{{ $info['week'] }}</td>
                        <td class="border p-2">{{ $info['shift'] }}</td>
                        <td class="border p-2">{{ $info['start_from'] }}</td>
                        <td class="border p-2">{{ $info['end_from'] }}</td>
                        <td class="border p-2">{{ $info['max_appointment'] }}</td>
                        <td class="border p-2">Actions</td>
                    </tr>
                @endforeach
                @if (!count($allschedule))
                    <tr>
                        <th colspan="7" class="text-muted text-center p-4">No Data Available</th>
                    </tr>
                @endif
            </tbody>
        </table>
    @endif
    @if ($isModalOpen)
        @include('schedule_form')
    @endif

</div>