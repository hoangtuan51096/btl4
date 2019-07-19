<?php

namespace App\Repositories\Books;

use App\Repositories\AbstractRepositoryInterface;

interface BookRepositoryInterface extends AbstractRepositoryInterface
{
    public function getTrash();

    public function restoreTrash($id);

    public function hardDelete($id);

    public function delayBook($bookID, $userID);
}
