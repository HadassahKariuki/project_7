<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();  // Get all students
        return view('students.index', compact('students'));  // Return the view with students data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');  // Return the create view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation for incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
        ]);

        Student::create($request->all());  // Capitalize Student model
        return redirect('students')->with('flash_message', 'Student Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $student = Student::findOrFail($id);  // Find the student by ID
        return view('students.show', compact('student'));  // Return the student details view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $student = Student::find($id);
        return view('students.edit')->with ('student', $student);
    }

     
    public function update(Request $request, string $id): RedirectResponse
    {
    
        try {
            // Validate the incoming data
            $request->validate([
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                'address' => 'required|string|max:255',
                'mobile' => 'required|string|max:15',
            ]);

            // Find the student and update their data
            $student = Student::findOrFail($id);
            $student->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
            $error_msg = $th->getMessage();
            return back()->with('error',  $error_msg);
        }
        

        // Redirect back to the students index page with a success message
        return redirect('/students')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $student = Student::findOrFail($id);
        $student->delete();  // Delete the student record

        // Redirect back to the students index page with a success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
