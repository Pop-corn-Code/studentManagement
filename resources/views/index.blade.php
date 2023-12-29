@extends('layouts.app')

@section('title', 'Home Page')
@section('content')
    <div class="container">
        <h1>Students Data</h1>
        <a href="{{route('add.std')}}" class="btn btn-primary flex justify-end">Add Student</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Aaddress</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Semester</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>#{{$student->id}}</td>
                        <td>{{ $student->firstname." ".$student->lastname }}</td>
                        <td>IS{{ $student->email }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->semester }}</td>
                        <td>
                            {{-- <a class="btn btn-info" href="{{ route('students.show', $student->id) }}">Show</a> --}}

                            <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Edit</a>

                            <a class="btn btn-danger" data-bs-toggle="modal" href="#dltstudentM{{ $student->id }}"
                                role="button">Delete</a>
                            <div class="btn-group me-2" role="group" aria-label="Second group">
                                <div class="modal fade" id="dltstudentM{{ $student->id }}" data-bs-backdrop="static"
                                    aria-hidden="true" aria-labelledby="dltLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="dltLabel">Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this student ?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-outline-primary"
                                                    href="{{ route('students.dlt', $student->id) }}">Yes</a>
                                                <button class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
               
            </tfoot>
        </table>
         <div class="pagination justify-content-end">
                    {!! $students->links('vendor.pagination.bootstrap-5') !!}
                </div>
    </div>
@endsection
