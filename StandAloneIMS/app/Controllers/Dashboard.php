<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Dashboard extends BaseController
{
    protected $user;
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->user = new User();
        // Add your code here.
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['header'] = "Dashboard";
        // $data['User'] = $this->user->where("email", session()->get("email"))->first();
        return view('dashboard/index', $data);
    }
}
