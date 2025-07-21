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
                        <select class="form-select" name="major" id="major">
                            <option selected value="">SELECT YOUR MAJOR</option>
                            <option value="1">Computer Science</option>
                            <option value="2">Accounting</option>
                            <option value="3">Psychology</option>
                        </select>
                        <div id="major-error" style="font-size: 14px" class="text-danger ajax-error"></div>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
