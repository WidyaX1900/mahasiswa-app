{{-- Modal add data student --}}
<div class="modal fade" id="addStudentFormModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addStudentForm">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add Student</h1>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Full Name..."
                            name="name">
                        <div id="name-error" style="font-size: 14px" class="text-danger ajax-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="youremail@example.com"
                            name="email">
                        <div id="email-error" style="font-size: 14px" class="text-danger ajax-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Major</label>
                        <select class="form-select" name="major_id" id="major_id">
                            <option selected value="">SELECT YOUR MAJOR</option>
                            @foreach ($majors as $major)
                                <option value="{{ $major->id }}">
                                    {{ $major->name }}
                                </option>    
                            @endforeach
                        </select>
                        <div id="major_id-error" style="font-size: 14px" class="text-danger ajax-error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="saveStudentBtn" type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Save student
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal show data student --}}
<div class="modal fade" id="studentViewModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Student Info</h1>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column">
                    <div class="d-flex mb-1">
                        <span role="name-label" class="me-2">Name:</span>
                        <span id="name-show" role="name-content"></span>
                    </div>
                    <div class="d-flex mb-1">
                        <span role="email-label" class="me-2">Email:</span>
                        <span id="email-show" role="email-content"></span>
                    </div>
                    <div class="d-flex mb-1">
                        <span role="major-label" class="me-2">Major:</span>
                        <span id="major-show" role="major-content"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal edit data student --}}
<div class="modal fade" id="editStudentFormModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editStudentForm">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Student</h1>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="edit-name" placeholder="Full Name..."
                            name="name">
                        <div id="edit-name-error" style="font-size: 14px" class="text-danger edit-ajax-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="edit-email"
                            placeholder="youremail@example.com" name="email">
                        <div id="edit-email-error" style="font-size: 14px" class="text-danger edit-ajax-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Major</label>
                        <select class="form-select" name="major_id" id="edit-major_id">
                            <option selected value="">SELECT YOUR MAJOR</option>
                            @foreach ($majors as $major)
                                <option value="{{ $major->id }}">
                                    {{ $major->name }}
                                </option>    
                            @endforeach
                        </select>
                        <div id="edit-major_id-error" style="font-size: 14px" class="text-danger edit-ajax-error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="saveStudentBtn" type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Save student
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal delete data student --}}
<div class="modal fade" id="deleteStudentFormModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteStudentForm">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="delete-id">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Delete Student</h1>
                </div>
                <div class="modal-body">
                    <p class="text-center">Are you sure permanently delete <strong id="deleteStudentName"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="deleteStudentBtn" type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash-can me-1"></i> Yes, delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>