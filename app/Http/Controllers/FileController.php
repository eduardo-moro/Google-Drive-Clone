<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFolderRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\File;

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

    public function createFolder(StoreFolderRequest $request)
    {
        $data = $request->validated();
        $parent = $request->parent;

        if (!$parent)
        {
            $parent = $this->getRoot();
        }


        $file = new File();
        $file->is_folder = 1;
        $file->name = $data['name'];

        $parent->appendNode($file);
    }

    private function getRoot()
    {
        return File::query()->whereIsRoot()->where('created_by', Auth::id())->firstOrFail();
    }
}
