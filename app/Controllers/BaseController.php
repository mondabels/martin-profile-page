<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = ['cookie', 'date', 'security', 'menu', 'useraccess'];
    protected $session, $validation, $encrypter, $ApplicationModel, $data = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->session = service('session');
        $this->validation = \Config\Services::validation();
        $this->encrypter = \Config\Services::encrypter();
        $this->ApplicationModel = new ApplicationModel();

        // --- Fetch logged-in user safely ---
        $userId = $this->session->get('user')['id'] ?? null;
        $user = $userId ? $this->ApplicationModel->getUser(userID: $userId) : null;

        // --- Fetch role-based menu safely ---
        $roleId = $this->session->get('user')['role'] ?? null;
        $menuCategory = $roleId ? $this->ApplicationModel->getAccessMenuCategory($roleId) : [];

        // --- Safe URI segments (won’t break if URI is empty) ---
        $segment = '';
        $subsegment = '';
        try {
            $uri = service('uri');
            $segment = $uri->getSegment(1) ?? '';
            $subsegment = $uri->getSegment(2) ?? '';
        } catch (\Exception $e) {
            // Leave segments empty if URI service fails
        }

        // --- Pass data to controllers/views ---
        $this->data = [
            'segment'      => $segment,
            'subsegment'   => $subsegment,
            'user'         => $user,
            'MenuCategory' => $menuCategory
        ];
    }
}