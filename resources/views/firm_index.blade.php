<x-app-layout>

    <div class="main-container d-flex gap-3 w-100 min-vh-100">
        <div class="firm-container1 w-50 bg-white p-4 rounded">
            <h5><a href="/firm/create" class="btn btn-success"><b>Register new</b> Firm/Company/Shop</a></h5> 
            <h5 class="mt-5 mb-3">Your Firms</h5>
            <h5>Today Schedule</h5>
        </div>
    
        <div class="firm-container2 bg-white w-100 p-4 rounded overflow-auto flex-3">
            <ul class="nav nav-tabs" id="firmTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#firm">Firm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#slot">Slot</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#map">Map</a>
                </li>
            </ul>
    
            <div class="tab-content mt-3">
                <div id="firm" class="tab-pane fade show active">
                    @foreach ($info as $firm)
                    <div class="firm-card gap-4 d-flex align-items-center p-4 rounded bg-white mb-4 position-relative flex-wrap">
                        <div class="profile-pic">
                            <img class="w-100 h-100 overflow-hidden" src="..\image\second firm.png" alt="Profile Picture"  class="img-fluid">
                        </div>
                        <div class="firm-info">
                            <h5 class="mb-4 text-uppercase"><b>{{$firm['firm_name']}}</b></h5>
                            <p><strong>Mobile:</strong> {{$firm['firm_mobile']}}</p>
                            <p><strong>Address:</strong> {{$firm['address'] }}, {{ $firm['pincode'] }}, {{ $firm['street'] }}, {{ $firm['landmark'] }}, {{ $firm['city'] }}, {{ $firm['state'] }}</p>
                            <p><strong>Since:</strong> {{$firm['since']}}</p>
                            <p><strong>PAN No:</strong> {{$firm['pan_no']}}</p>
                            <p><strong>GST No:</strong> {{$firm['gst_no']}}</p>
                            <p><strong>Register No:</strong> {{$firm['register_no']}}</p>
                        </div>
                        <button class="btn btn-primary position-absolute top-0 end-0 m-2">
                            <a href="" class="text-white text-decoration-none">Edit</a>
                        </button>
                     </div>
                    @endforeach
                </div>
            </div>
            <div id="slot" class="tab-pane fade">
                <p>Slot-related content...</p>
            </div>
            <div id="map" class="tab-pane fade">
                <p>Map content here...</p>
            </div>
        </div>
    </div>
</x-app-layout> 