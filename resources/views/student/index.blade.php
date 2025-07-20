@extends('layouts.layout')
@extends('layouts.navbar')
@section('content')
    <div class="container mt-3">
        <h3 class="mb-4">Students Data</h3>
        <button type="button" class="btn btn-primary">
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
@endsection
