<?php

namespace App\Controller;

use App\System\Controller;

class Dashboard extends Controller
{

    public function __construct()
    {
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }

    public function index()
    {
        return view('dashboard/index', []);
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
