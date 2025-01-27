<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFolderRequest;
use App\Http\Resources\FileResource;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\File;

class FileController extends Controller
{
    public function dashboard(string $folder = null)
    {
        if( $folder)
        {
            $folder = File::query()
                ->where('created_by', Auth::id())
                ->where('path', $folder)
                ->firstOrFail();
        } else {
            $folder = File::getRoot();
        }

        $files = File::query()->where('parent_id', $folder->id)
                     ->where('created_by', Auth::id())
                     ->orderBy('is_folder', 'desc')
                     ->orderBy('created_at', 'desc')
                     ->paginate(20);

        $files = FileResource::collection($files);

        $ancestors = FileResource::collection([...$folder->ancestors, $folder]);

        $folder = new FileResource($folder);

        return Inertia::render('dashboard', compact('files', 'folder', 'ancestors'));
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
            $parent = File::getRoot();
        }

        $file = new File();
        $file->is_folder = 1;
        $file->name = $data['name'];

        $parent->appendNode($file);
    }
}
