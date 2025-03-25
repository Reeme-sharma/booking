<x-app-layout>
    <div class="main-container d-flex w-100 min-vh-100">
        <div class="firm-container1 w-50 bg-white p-4 rounded">
            <h5><a href="/firm/create" class="btn btn-success"><b>Register new</b> Firm/Company/Shop</a></h5> 
            <h5 class="mt-5 mb-3">Your Firms</h5>
            <h5>Today Schedule</h5>
        </div>

        <div class="firm-container2 bg-white w-100 p-4 rounded overflow-auto flex-3">
            @foreach ($info as $index => $firm)
            <div class="shadow-lg rounded p-3 mb-3">
                <ul class="nav nav-tabs w-100 position-relative " id="firmTabs-{{ $index }}">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#firm-{{ $index }}">Firm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Today-Schedule-{{ $index }}">Today Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#map-{{ $index }}">Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#schedule-{{ $index }}">Schedule</a>
                    </li>
                   
                <h5 class="position-absolute top-0 end-0 m-2 text-uppercase text-secondary" >{{ $firm['firm_name'] }}</h5>
                 
                 </ul>
                

                <div class="tab-content mt-3">
                    <div id="firm-{{ $index }}" class="tab-pane fade show active">
                        <div class="firm-card gap-4 d-flex align-items-center p-4 rounded bg-white mb-4 position-relative flex-wrap">
                            <div class="profile-pic">
                                <img class="w-100 h-100 overflow-hidden" src="/image/{{ $firm->profilepic ? $firm->profilepic : 'not found.jpg' }}" alt="Profile Picture" class="img-fluid">
                                <div class="mt-4 text-center">
                                    <form action="updateprofilepic" method="POST" enctype="multipart/form-data" id="frm_{{ $index }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $firm->id }}">
                                    <label for="profilepic-{{ $index }}" class="link active text-primary cursor-pointer" title="upload profile picture">{{ $firm['profilepic'] ? 'Edit' : 'Upload' }} Image</label>
                                    <input type="file" name="profilepic" onchange="document.getElementById('frm_{{ $index }}').submit()" class="d-none" id="profilepic-{{ $index }}" accept="image/*">
                                    </form>
                                </div>
                            </div>
                            <div class="firm-info">
                                {{-- <h5 class="mb-4 text-uppercase"><b>{{$firm['firm_name']}}</b></h5> --}}
                                <p><strong>Mobile:</strong> {{$firm['firm_mobile']}}</p>
                                <p><strong>Address:</strong> {{$firm['address'] }}, {{ $firm['pincode'] }}, {{ $firm['street'] }}, {{ $firm['landmark'] }}, {{ $firm['city'] }}, {{ $firm['state'] }}, {{ $firm['country'] }}</p>
                                <p><strong>Since:</strong> {{$firm['since']}}</p>
                                <p><strong>PAN No:</strong> {{$firm['pan_no']}}</p>
                                <p><strong>GST No:</strong> {{$firm['gst_no']}}</p>
                                <p><strong>Register No:</strong> {{$firm['register_no']}}</p>
                            </div>
                            {{-- <button class="btn btn-primary position-absolute top-0 end-0 m-2"> --}}
                                {{-- <a href="{{ route('firm_edit') }}" class="text-white text-decoration-none">Edit</a> --}}
                            {{-- </button> --}}
                        <button wire:click="$emit('editFirm', {{ $firm->id }})" class="btn btn-primary bg-yellow-500 text-white px-2 py-1">Edit</button>
                        </div>
                    </div>

                    <div id="Today-Schedule-{{ $index }}" class="tab-pane fade">
                        @livewireStyles
                        @livewire('today-schedule', ['firm' => $firm])
                        @livewireScripts
                    </div>

                    <div id="map-{{ $index }}" class="tab-pane fade">

                        <button onclick="getLocation({{ $firm['id'] }})" class="btn btn-primary">Get my location</button>
                        <p>
                            You can enter your Latitude and Longitude From <a href="https://map.google.com/" target="_blank">Google Map</a>
                        </p>
                        <form method="post" action="/firm/mapupdate/{{ $firm['id'] }}">
                            @csrf
                            @method('patch')
                        <div class="mb-3">
                            <label for="Latitude">Latitude :</label>
                            <input type="text" name="latitude" id="latitude-{{ $firm['id']}}" value="{{ $firm['latitude'] }}">
                        </div>
                        <div  class="mb-3">
                            <label for="Longitude">Longitude :</label>
                            <input type="text" name="longitude" id="longitude-{{ $firm['id']}}" value="{{ $firm['longitude'] }}">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success">Submit</button>
                        </div>
                        </form>
                    </div>


                    <div id="schedule-{{ $index }}" class="tab-pane fade">
                        @livewireStyles
                        @livewire('schedule-l', ['firm' => $firm])
                        @livewireScripts
                     </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        function getLocation(id) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition.bind(null, id), showError);
            } else {
                document.getElementById("location").innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(id,position) {
           
            document.getElementById("latitude-"+id).value =  position.coords.latitude ;
            document.getElementById("longitude-"+id).value =  position.coords.longitude ;
               

            // You can now send this data to your server if needed
            // Example: sendLocationToServer(position.coords.latitude, position.coords.longitude);
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    document.getElementById("location").innerHTML = "User denied the request for geolocation.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    document.getElementById("location").innerHTML = "Location information is unavailable.";
                    break;
                case error.TIMEOUT:
                    document.getElementById("location").innerHTML = "The request to get user location timed out.";
                    break;
                case error.UNKNOWN_ERROR:
                    document.getElementById("location").innerHTML = "An unknown error occurred.";
                    break;
            }
        }

        // Optional: Function to send location to your server
        function sendLocationToServer(latitude, longitude) {
            // Use AJAX (fetch or XMLHttpRequest) to send the data to your backend
            fetch('/store-location', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        latitude: latitude,
                        longitude: longitude
                    }),
                })
                .then(response => {
                    console.log('Location sent to server:', response);
                })
                .catch(error => {
                    console.error('Error sending location:', error);
                });
        }
    </script>

</x-app-layout>    

