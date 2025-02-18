
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border p-4 shadow-lg">
                <div class="bg-success text-white p-3 mb-3">
                    <h4 class="mb-0 text-center">Create Schedule for "{{ $firm['firm_name'] }}"</h4>
                </div>
                <div>
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Select a Day <span class="text-danger">*</span></label>
                            <select class="form-select" name="week" required>
                                <option value="">-- Select Day --</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Shift Timing</label>
                            <select class="form-select" name="shift">
                                <option value="">-- Select Shift --</option>
                                <option value="Morning">Morning</option>
                                <option value="Evening">Evening</option>
                                <option value="Full Day">Full Day</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Start Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="start_from" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">End Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="end_from" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Max Appointments <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="max_appointment" placeholder="Enter max appointments" required>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success btn-lg w-50 ">Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


