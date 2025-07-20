@extends('layouts.layout')
@extends('layouts.navbar')
@section('content')
    <div class="container mt-3">
        <h3 class="mb-4">Students Data</h3>
        <button id="addStudentBtn" type="button" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> Add Student
        </button>
        <table class="table table-light table-striped mt-4 text-center">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info me-2">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-warning me-2">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="studentFormModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="studentForm">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalTitle">Add Student</h1>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Full Name..." name="name">
                            <div id="name-error" style="font-size: 14px" class="text-danger ajax-error"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="youremail@example.com" name="email">
                            <div id="email-error" style="font-size: 14px" class="text-danger ajax-error"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Major</label>
                            <select class="form-select" name="major">
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
                        <button id="saveStudentBtn" type="submit" class="btn btn-primary" data-type="add">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Save student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
