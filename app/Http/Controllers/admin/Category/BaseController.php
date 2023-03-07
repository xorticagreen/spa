<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use App\Services\Category\Service;

class BaseController extends Controller
{
    public object $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
