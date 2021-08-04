<?php

namespace dang\ManagePost;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use dang\ManagePost\Contracts\ManagePostInterface;


/**
 * Class AbstractRepository
 *
 * @package Kenini\Repository
 */
class AbstractRepository implements ManagePostInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findPostById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function createPost(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function updatePost(Model $model, array $attributes = [])
    {
        return $model->update($attributes);
    }

    public function deletePost(Model $model)
    {
        return $model->delete();
    }

    public function findAll($columns = ['*'])
    {
        return $this->model->get();
    }

    public function model()
    {
        return get_class($this->model);
    }

    public function makeModel()
    {
        $this->model = App::make($this->model());

        return $this->model;
    }

    public function resetModel()
    {
        return $this->makeModel();
    }
}
