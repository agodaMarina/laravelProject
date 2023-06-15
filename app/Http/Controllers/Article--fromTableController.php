<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticle--fromTableRequest;
use App\Http\Requests\UpdateArticle--fromTableRequest;
use App\Repositories\Article--fromTableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Article--fromTableController extends AppBaseController
{
    /** @var Article--fromTableRepository $articleFromTableRepository*/
    private $articleFromTableRepository;

    public function __construct(Article--fromTableRepository $articleFromTableRepo)
    {
        $this->articleFromTableRepository = $articleFromTableRepo;
    }

    /**
     * Display a listing of the Article--fromTable.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $articleFromTables = $this->articleFromTableRepository->all();

        return view('article--from_tables.index')
            ->with('articleFromTables', $articleFromTables);
    }

    /**
     * Show the form for creating a new Article--fromTable.
     *
     * @return Response
     */
    public function create()
    {
        return view('article--from_tables.create');
    }

    /**
     * Store a newly created Article--fromTable in storage.
     *
     * @param CreateArticle--fromTableRequest $request
     *
     * @return Response
     */
    public function store(CreateArticle--fromTableRequest $request)
    {
        $input = $request->all();

        $articleFromTable = $this->articleFromTableRepository->create($input);

        Flash::success('Article--From Table saved successfully.');

        return redirect(route('articleFromTables.index'));
    }

    /**
     * Display the specified Article--fromTable.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articleFromTable = $this->articleFromTableRepository->find($id);

        if (empty($articleFromTable)) {
            Flash::error('Article--From Table not found');

            return redirect(route('articleFromTables.index'));
        }

        return view('article--from_tables.show')->with('articleFromTable', $articleFromTable);
    }

    /**
     * Show the form for editing the specified Article--fromTable.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articleFromTable = $this->articleFromTableRepository->find($id);

        if (empty($articleFromTable)) {
            Flash::error('Article--From Table not found');

            return redirect(route('articleFromTables.index'));
        }

        return view('article--from_tables.edit')->with('articleFromTable', $articleFromTable);
    }

    /**
     * Update the specified Article--fromTable in storage.
     *
     * @param int $id
     * @param UpdateArticle--fromTableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticle--fromTableRequest $request)
    {
        $articleFromTable = $this->articleFromTableRepository->find($id);

        if (empty($articleFromTable)) {
            Flash::error('Article--From Table not found');

            return redirect(route('articleFromTables.index'));
        }

        $articleFromTable = $this->articleFromTableRepository->update($request->all(), $id);

        Flash::success('Article--From Table updated successfully.');

        return redirect(route('articleFromTables.index'));
    }

    /**
     * Remove the specified Article--fromTable from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articleFromTable = $this->articleFromTableRepository->find($id);

        if (empty($articleFromTable)) {
            Flash::error('Article--From Table not found');

            return redirect(route('articleFromTables.index'));
        }

        $this->articleFromTableRepository->delete($id);

        Flash::success('Article--From Table deleted successfully.');

        return redirect(route('articleFromTables.index'));
    }
}
