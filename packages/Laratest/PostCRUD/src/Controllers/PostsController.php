<?php

namespace MyVendorAbc\PostCRUD\Controllers;

use Illuminate\Http\Request;
use MyVendorAbc\PostCRUD\Requests\EditPostRequest;
use MyVendorAbc\PostCRUD\Services\PostServiceContract;
use MyVendorAbc\PostCRUD\Requests\CreatePostRequest;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    protected $service;

    public function __construct(PostServiceContract $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        $items = $this->service->paginate();
        return view('post-crud::posts.index', compact("items"));
    }

    public function create()
    {
        return view('post-crud::posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        $this->service->store($request->all());
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $item = $this->service->find($id);
        return view('post-crud::posts.show', compact('item'));
    }

    public function edit($id)
    {
        $item = $this->service->find($id);
        return view('post-crud::posts.edit', compact('item'));
    }

    public function update(EditPostRequest $request, $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('posts.index');
    }
}
