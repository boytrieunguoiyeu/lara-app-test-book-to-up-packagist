<?php

namespace Laratest\PostCRUD\Repositories;

use Laratest\PostCRUD\Models\Post;

class PostRepository implements PostRepositoryContract
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        return $this->model->paginate(10);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->find($id);
        return $model->destroy($id);
    }

}