<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('title', 'Create Page')
@section('content')
    <div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-3"></div>
            <div class="card"
                style="margin-top:10px; width: 50%; left:0; right: 0; bottom: 0; top: 0; margin: auto; padding-top: 10px">
                <div class="card-body">
                    <h1 class="text-center mb-3">Editing student `{{$student->firstname.' '.$student->lastname}}`</h1>
                    <div class="mb-3 row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="name" class="form-label">Student name</label>
                        </div>
                        <div class="col-auto ">
                            <input type="text" class="form-control" name="firstname" id="firstname"
                                placeholder="FirstName" value="{{$student->firstname}}" required>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control" name="lastname" id="lastname" value="{{$student->lastname}}"
                                placeholder="LastName" required>
                        </div>
                    </div>
                    <div class="mb-3 row g-5 align-items-center">
                        <div class="col-auto">
                            <label for="formGroupExampleInput" class="form-label">E-mail</label>
                        </div>
                        <div class="col-auto">
                            <input type="mail" class="form-control" name="email" id="email" value="{{$student->email}}"
                                placeholder="ex.john@gmail.com" required>
                        </div>
                    </div>
                    <div class="mb-3 row g-4 align-items-center">
                        <div class="col-auto">
                            <label for="author" class="form-label">Address</label>
                        </div>
                        <div class="col-auto">
                            <textarea id="address" name="address" rows="3"  placeholder="Eg. Ratampar,Rajkot,Guj...">{{$student->firstname}}</textarea>
                        </div>
                    </div>
                    <div class="mb-3 row g-2 align-items-center">
                        <div class="col-auto">
                            <label for="publisher" class="form-label">Phone Number</label>
                        </div>
                        <div class="col-auto"><input type="text" class="form-control" name="phone" id="phone" value="{{$student->phone}}"
                                placeholder="Eg. +91 91576 76509">
                        </div>
                    </div>
                    <div class="mb-3 row g-4 align-items-center">
                        <div class="col-auto">
                            <label for="quantity" class="form-label">Semester</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="semester" id="semester" value="{{$student->semester}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center gap-2 mt-3">
                <a href="/" class="btn btn-danger">Cancel</a>
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>

    </div>
@endsection
