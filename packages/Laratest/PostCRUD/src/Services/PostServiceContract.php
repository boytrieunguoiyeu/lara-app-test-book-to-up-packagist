<?php

namespace Myvendorabc\PostCRUD\Services;

interface PostServiceContract
{
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}