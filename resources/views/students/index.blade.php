@extends('layout')

@section('content')
    <div class="container">
        <h3 align="center" class="mt-5">Student Application</h3>
       
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="form-area">
                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="dob">Student DOB</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                                @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div class="col-md-3 form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}">
                                @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-warning">Register Now</button>
                        </div>
                    </form>
                </div>

                @if($students->isNotEmpty())
                    <table class="table table-dark mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $student)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->dob }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->mobile }}</td>
                                    <td>
                                        <!-- Action Buttons with Inline Styling -->
                                        <div class="btn-group" role="group">
                                            <!-- View Button -->
                                            <a href="{{ url('/students/' . $student->id) }}" class="btn btn-info" title="View student">View</a>

                                            <!-- Edit Button -->
                                            <a href="{{ url('/students/' . $student->id . '/edit') }}" class="btn btn-primary" title="Edit student">Edit</a>

                                            <!-- Delete Form -->
                                            <form method="POST" action="{{ url('/students/' . $student->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Delete student">Delete</button>
                                            </form>

                                            <!-- Print Button -->
                                            <a href="javascript:void(0);" onclick="window.print();" class="btn btn-secondary" title="Print student details">Print</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No students found.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Inline CSS -->
    <style>
        .btn-group {
            display: flex;
            gap: 5px; /* Adds space between buttons */
        }

        .btn-group a, .btn-group form button {
            margin-right: 5px; /* Optional: adds margin between buttons */
        }
    </style>
@endsection
