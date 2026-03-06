<?php

namespace App\Controllers;

use App\Models\StudentInfoModel;
use CodeIgniter\Controller;

class StudentInfo extends BaseController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentInfoModel();
    }

    // Show dashboard 3 with student view
    public function index()
    {
        $data = array_merge($this->data, [
            'title' => 'Student Management',
            'students' => $this->studentModel->findAll()
        ]);
        return view('pages/commons/student_view', $data);
    }

    // Add a new student
    public function store()
    {
        $this->studentModel->insert([
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course')
        ]);

        return redirect()->back()->with('success', 'Student added successfully!');
    }

    // Delete a student
    public function delete($id)
    {
        $this->studentModel->delete($id);
        return redirect()->back()->with('success', 'Student deleted successfully!');
    }
}