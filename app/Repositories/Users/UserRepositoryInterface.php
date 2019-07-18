<?php

namespace App\Repositories\Users;

use App\Repositories\AbstractRepositoryInterface;

interface UserRepositoryInterface extends AbstractRepositoryInterface
{
    public function getTrash();

    public function restoreTrash($id);

    public function hardDelete($id);

    public function getUserRent();

    public function getUserEndDate();

}
