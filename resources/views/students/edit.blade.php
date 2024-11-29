@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
 
        <form action="{{ url('students/' . $student->id) }}" method="post">
            @csrf  <!-- CSRF Token -->
            @method('PATCH')
            
            <!-- Hidden field for the student ID -->
            <input type="hidden" name="id" value="{{ $student->id }}" />
            
            <label>Name</label></br>
            <!-- Corrected input for name -->
            <input type="text" name="name" value="{{ $student->name }}" class="form-control" required></br>

            <label for="dob">Date of Birth</label></br>
           
            <input type="text" name="dob" value="{{ $student->address }}" class="form-control" required></br>
            
            <label for="address">Address</label></br>
            <!-- Corrected input for address -->
            <input type="text" name="address" value="{{ $student->address }}" class="form-control" required></br>
            
            <label for="mobile">Mobile</label></br>
            <!-- Corrected input for mobile -->
            <input type="text" name="mobile" value="{{ $student->mobile }}" class="form-control" required></br>
            
            <input type="submit" value="Update" class="btn btn-success">
        </form>
    </div>
</div>
@endsection
