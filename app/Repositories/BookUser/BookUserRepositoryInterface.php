<?php

namespace App\Repositories\BookUser;

use App\Repositories\AbstractRepositoryInterface;

interface BookUserRepositoryInterface extends AbstractRepositoryInterface
{
    public function getBookRenting($userId);

    public function giveBackBook($data);

    public function checkUserRentBook($userId);

    public function rentBook($data, $userId);
}
