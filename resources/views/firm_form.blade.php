
<x-app-layout>
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="p-4 border rounded shadow-lg bg-light ">
                <div class="bg-primary text-white text-center p-2 rounded">
                    <h3 class="mb-1">Register Your Firm</h3>
                </div>
                <div class="mt-3">                
                    <form action="{{ isset($data) ? route('firm.update', $data->id) : route('firm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($data))
                        @method('PUT')
                        @endif
                        <input type="hidden" name="id" value="{{ $data->id}}"> 
                        <!-- Firm Name -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Firm Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="firm_name" value="{{ $data->firm_name ?? '' }}" placeholder="--Firm Name--" required>
                        </div>

                        <!--Firm Type-->
                    <div class="mb-3">
                     <label class="form-label fw-bold">Category <span class="text-danger">*<span></label>
                     <input list="categoryList" name="category" class="form-control" value="{{ isset($data) ? $data->category : '' }}">
                           <datalist id="categoryList">
                              @foreach($categories as $cat)
                                 <option value="{{ $cat }}">
                              @endforeach
                           </datalist>

                          </div>
                          
                        <!-- Mobile Number -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Mobile Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="firm_mobile" value="{{ $data->firm_mobile ?? '' }}" placeholder="--Mobile Number--" required>
                        </div>

                        <!-- About us -->
                         <div class="mb-3">
                            <label class="form-label fw-bold">About us</label>
                            <input type="text" class="form-control" name="about_us" value="{{ $data->about_us ?? ''}}" placeholder="--About us--">
                         </div>

                         <!-- since -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Since</label>
                            <input type="date" class="form-control" name="since" value="{{ $data->since ?? '' }}" placeholder="Select Date">
                        </div>

                        <!-- Pincode -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pincode <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pincode" value="{{ $data->pincode ?? '' }}" placeholder="Enter Pincode" required>
                        </div>

                        <!-- Street -->
                        <div class="mb-3">
                             <label class="form-label fw-bold">Street<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" name="street" value="{{ $data->street ?? '' }}" placeholder="Enter Street">
                        </div>

                        <!-- Landmark -->
                        <div class="mb-3">
                             <label class="form-label fw-bold">Landmark<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" name="landmark" value="{{ $data->landmark ?? '' }}" placeholder="Enter Landmark">
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="address" rows="2" placeholder="Enter Address" required>{{ $data->address ?? '' }}</textarea>
                        </div>

                        <!-- City & State -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" value="{{ $data->city ?? '' }}" placeholder="Enter City" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">State <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="state" value="{{ $data->state ?? '' }}" placeholder="Enter State" required>
                                </div>
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Country <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="country" value="{{ $data->country ?? '' }}" placeholder="Enter Country" required>
                        </div>

                        <!-- PAN Number & GST -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">PAN Number</label>
                                    <input type="text" class="form-control" name="pan_no" value="{{ $data->pan_no ?? '' }}" placeholder="Enter PAN No.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">GST Number</label>
                                    <input type="text" class="form-control" name="gst_no" value="{{ $data->gst_no ?? '' }}" placeholder="Enter GST No.">
                                </div>
                            </div>
                        </div>

                        <!-- Register No -->
                         <div class="mb-3">
                              <label class="form-label fw-bold">Register No</label>
                              <input type="text" class="form-control" name="register_no" value="{{ $data->register_no ?? '' }}" placeholder="Enter Registration Number">
                         </div>

                          <!-- Map -->
                          {{-- <div class="mb-3">
                            <label class="form-label fw-bold">Map</label>
                            <input type="url" class="form-control" name="map" placeholder="Enter Map URL">
                        </div> --}}

                         <!-- Map with google map -->
                         {{-- <div class="mb-3">
                            <label class="form-label fw-bold">Map</label>
                            <a href="https://www.google.com/maps" target="_blank" class="btn btn-primary">Pick your Location</a>
                        </div> --}}
                        

                        <!-- Profile Picture -->
                        {{-- <div class="mb-3">
                            <label class="form-label fw-bold">Upload Profile Picture</label>
                            <input type="file" class="form-control" name="profilepic">
                        </div> --}}

                        <!-- Submit Button -->
                        <div class="mt-4 text-center">
                            <button type="submit" class="btn btn-primary btn-lg w-50">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

