@extends('layouts.layout')
@extends('layouts.navbar')
@section('content')
    <div class="container mt-3">
        <div id="alertInfo"></div>
        <h3 class="mb-4">Students Data</h3>
        <button id="addStudentBtn" type="button" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> Add Student
        </button>
        <table id="studentTable" class="table table-light table-striped mt-4 text-center">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info me-2 view-btn" data-id="{{ $student->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-warning me-2 edit-btn"
                                data-id="{{ $student->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.modal')
