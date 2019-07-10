<?php

namespace App\Repositories;

interface AbstractRepositoryInterface
{
	public function getList();
	
    public function all();

    public function find($id);

    public function update($attribute, $id);

    public function create($attribute);

    public function delete($id);
}