<?php

namespace App\Repositories\Authors;

use App\Repositories\AbstractRepositoryInterface;

interface AuthorRepositoryInterface extends AbstractRepositoryInterface
{
    public function getTrash();

    public function restoreTrash($id);

    public function hardDelete($id);

}
