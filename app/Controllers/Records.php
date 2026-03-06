<?php

namespace App\Controllers;

use App\Models\RecordModel;

class Records extends BaseController
{
    protected $recordModel;

    public function __construct()
    {
        $this->recordModel = new RecordModel();
    }

    // 3.2 Read — list all records
public function index()
{
    $data = array_merge($this->data, [
        'title'       => 'Products', // used in breadcrumb "Products"
        'page_header' => 'Inventory Management System', // shown as page heading
        'records'     => $this->recordModel->findAll()
    ]);

    return view('pages/commons/records/records_index', $data);
}

    // 3.1 Create — show create form
    public function create()
    {
        $data = array_merge($this->data, [
            'title' => 'Add New Record'
        ]);

        return view('pages/commons/records/records_create', $data);
    }

    // 3.1 Create — save record
    public function store()
    {
        $rules = [
            'name'        => 'required|min_length[3]|max_length[255]',
            'description' => 'required',
            'category'    => 'required',
            'price'       => 'required|decimal'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validation->getErrors()));
        }

        $this->recordModel->insert([
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'category'    => $this->request->getPost('category'),
            'price'       => $this->request->getPost('price')
        ]);

        return redirect()->to(base_url('records'))
            ->with('success', 'Record created successfully!');
    }

    // 3.2 Show — detail view
    public function show($id)
    {
        $record = $this->recordModel->find($id);

        if (!$record) {
            return redirect()->to(base_url('records'))
                ->with('error', 'Record not found.');
        }

        $data = array_merge($this->data, [
            'title'  => 'Record Details',
            'record' => $record
        ]);

        return view('pages/commons/records/records_show', $data);
    }

    // 3.3 Edit — show edit form
    public function edit($id)
    {
        $record = $this->recordModel->find($id);

        if (!$record) {
            return redirect()->to(base_url('records'))
                ->with('error', 'Record not found.');
        }

        $data = array_merge($this->data, [
            'title'  => 'Edit Record',
            'record' => $record
        ]);

        return view('pages/commons/records/records_edit', $data);
    }

    // 3.3 Update — save changes
    public function update($id)
    {
        $rules = [
            'name'        => 'required|min_length[3]|max_length[255]',
            'description' => 'required',
            'category'    => 'required',
            'price'       => 'required|decimal'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validation->getErrors()));
        }

        $record = $this->recordModel->find($id);
        if (!$record) {
            return redirect()->to(base_url('records'))
                ->with('error', 'Record not found.');
        }

        $this->recordModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'category'    => $this->request->getPost('category'),
            'price'       => $this->request->getPost('price')
        ]);

        return redirect()->to(base_url('records'))
            ->with('success', 'Record updated successfully!');
    }

    // 3.4 Delete — remove record
    public function delete($id)
    {
        $record = $this->recordModel->find($id);
        if (!$record) {
            return redirect()->to(base_url('records'))
                ->with('error', 'Record not found.');
        }

        $this->recordModel->delete($id); // hard delete
        return redirect()->to(base_url('records'))
            ->with('success', 'Record deleted successfully!');
    }
}