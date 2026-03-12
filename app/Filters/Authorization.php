<?php

namespace App\Filters;

use App\Models\ApplicationModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Authorization implements FilterInterface
{
    protected $ApplicationModel;

    public function before(RequestInterface $request, $arguments = null)
    {
        $this->ApplicationModel = new ApplicationModel();
        $uri = service('uri');
        $role = session()->get('role');

        // Admin always has full access
        if ($role == 1) {
            return; // bypass all checks
        }

        $segment = $uri->getSegment(1);
        if (!$segment) {
            return; // no segment, no restriction
        }

        // Get menu by URL segment
        $menu = $this->ApplicationModel->getMenuByUrl($segment);

        if (!$menu) {
            // If no menu found, redirect home
            return redirect()->to(base_url('/'));
        }

        // Check menu access first
        $accessData = [
            'roleID' => $role,
            'menuID' => $menu['menu_id'] ?? null,
            'submenuID' => null,
            'menuCategoryID' => $menu['menu_category_id'] ?? null
        ];

        $hasMenuAccess = false;

        // Check category access
        if (!empty($accessData['menuCategoryID'])) {
            $hasMenuAccess = $this->ApplicationModel->checkUserMenuCategoryAccess([
                'roleID' => $role,
                'menuCategoryID' => $accessData['menuCategoryID']
            ]) > 0;
        }

        // Check menu access
        if (!$hasMenuAccess && !empty($accessData['menuID'])) {
            $hasMenuAccess = $this->ApplicationModel->checkUserAccess([
                'roleID' => $role,
                'menuID' => $accessData['menuID']
            ]) > 0;
        }

        // Check submenu access
        if (!$hasMenuAccess && !empty($accessData['submenuID'])) {
            $hasMenuAccess = $this->ApplicationModel->checkUserSubmenuAccess([
                'roleID' => $role,
                'submenuID' => $accessData['submenuID']
            ]) > 0;
        }

        if (!$hasMenuAccess) {
            // Not granted, redirect to forbidden
            return redirect()->to(base_url('blocked'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing needed here
    }
}