<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Show profile
    public function show()
    {
        $userSession = session()->get('user'); // get current logged-in user
        if (!$userSession || !isset($userSession['id'])) {
            session()->destroy();
            return redirect()->to(base_url('login'));
        }

        // Fetch from database using session user id
        $user = $this->userModel->find((int) $userSession['id']);

        return view('pages/commons/profile/show', [
            'user' => $user
        ]);
    }

    // Show edit form
    public function edit()
    {
        $userSession = session()->get('user'); // get current logged-in user
        if (!$userSession || !isset($userSession['id'])) {
            session()->destroy();
            return redirect()->to(base_url('login'));
        }

        // Fetch from database using session user id
        $user = $this->userModel->find((int) $userSession['id']);

        return view('pages/commons/profile/edit', [
            'user' => $user
        ]);
    }

    // Process form submission
    public function update()
    {
        $sessionUser = session()->get('user');

        if (!$sessionUser || !isset($sessionUser['id'])) {
            session()->destroy();
            return redirect()->to(base_url('login'));
        }

        $userId = $sessionUser['id'];
        $user = $this->userModel->find($userId);

        if (!$user) {
            session()->destroy();
            return redirect()->to(base_url('login'));
        }

        $rules = [
            'fullname' => 'required',
            'username' => "required|valid_email|is_unique[users.username,id,{$userId}]",
            'student_id' => 'permit_empty',
            'course' => 'permit_empty',
            'year_level' => 'permit_empty|integer',
            'section' => 'permit_empty',
            'phone' => 'permit_empty',
            'address' => 'permit_empty',
        ];

if (!$this->validate($rules)) {
    dd($this->validator->getErrors());
}

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $imageName = $sessionUser['profile_image'] ?? '';
        if ($imageFile = $this->request->getFile('profile_image')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                $imageName = $imageFile->getRandomName();
                $imageFile->move(FCPATH . 'uploads/profile/', $imageName);
            }
        }

        $updateData = [
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'student_id' => $this->request->getPost('student_id'),
            'course' => $this->request->getPost('course'),
            'year_level' => $this->request->getPost('year_level'),
            'section' => $this->request->getPost('section'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'profile_image' => $imageName,
        ];

        $this->userModel->updateProfile($userId, $updateData);

        session()->set('user', array_merge($sessionUser, $updateData));

        session()->setFlashdata('success', 'Profile updated successfully.');

        return redirect()->to(base_url('profile'));
    }
}