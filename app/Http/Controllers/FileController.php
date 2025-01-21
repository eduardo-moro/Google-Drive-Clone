<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FileController extends Controller
{
    public function myFiles()
    {
        return Inertia::render('MyFiles');
    }

    public function sharedByMe()
    {
        return Inertia::render('SharedByMe');
    }

    public function sharedWithMe()
    {
        return Inertia::render('SharedWithMe');
    }

    public function trash()
    {
        return Inertia::render('Trash');
    }

}
