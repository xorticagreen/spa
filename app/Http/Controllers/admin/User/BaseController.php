<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\Controller;
use App\Services\User\Service;

class BaseController extends Controller
{
    public object $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
