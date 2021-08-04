<?php

namespace dang\ManagePost\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
interface ManagePostInterface
{
    public function findAll($columns = ['*']);

    public function findPostById(int $id);

    public function createPost(array $attributes);

    public function updatePost(Model $model, array $attributes = []);

    public function deletePost(Model $model);

    public function model();

    public function makeModel();

    public function resetModel();
}
