@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Student Page</div>
    <div class="card-body">
        <form action="{{ url('students') }}" method="post">
            @csrf  <!-- This is the correct CSRF token -->
            
            <label for="name">Name</label></br>
            <input type="text" name="name" id="name" class="form-control" required></br>
            
            <label for="address">Address</label></br>
            <input type="text" name="address" id="address" class="form-control" required></br>
            
            <label for="mobile">Mobile</label></br>
            <input type="text" name="mobile" id="mobile" class="form-control" required></br>
            
            <input type="submit" value="Save" class="btn btn-success mt-3">
        </form>
    </div>
</div>
@endsection
