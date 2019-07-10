<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Authors\AuthorRepositoryInterface;

class AuthorController extends Controller
{
    protected $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository){
        $this->author = $authorRepository;
    }

    public function index()
    {
        $listAuthors = $this->author->getList();
        return view('admin.authors.list-authors', compact('listAuthors'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $deleteAuthor = $this->author->delete($id);
        return redirect()->route('author.index');
    }
    
    public function addAuthor(Request $request)
    {
        $addAuthor = $this->author->create($request->all());
        return view('admin.authors.create-author', compact('addAuthor'))->render();
    }

    public function editAuthorAjax(Request $request)
    {
        $author = $this->author->find($request->id);
        $rowid = $request->rowid;
        return view('admin.authors.edit-author', compact('author', 'rowid'));
    }

    public function updateAuthorAjax(Request $request)
    {
        $updateAuthor = $this->author->update($request->all(), $request->id);
        $rowid = $request->rowid;
        return view('admin.authors.update-author', compact('updateAuthor', 'rowid'));
    }
}
