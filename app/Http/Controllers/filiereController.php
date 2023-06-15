<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefiliereRequest;
use App\Http\Requests\UpdatefiliereRequest;
use App\Repositories\filiereRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class filiereController extends AppBaseController
{
    /** @var filiereRepository $filiereRepository*/
    private $filiereRepository;

    public function __construct(filiereRepository $filiereRepo)
    {
        $this->filiereRepository = $filiereRepo;
    }

    /**
     * Display a listing of the filiere.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $filieres = $this->filiereRepository->all();

        return view('filieres.index')
            ->with('filieres', $filieres);
    }

    /**
     * Show the form for creating a new filiere.
     *
     * @return Response
     */
    public function create()
    {
        return view('filieres.create');
    }

    /**
     * Store a newly created filiere in storage.
     *
     * @param CreatefiliereRequest $request
     *
     * @return Response
     */
    public function store(CreatefiliereRequest $request)
    {
        $input = $request->all();

        $filiere = $this->filiereRepository->create($input);

        Flash::success('Filiere saved successfully.');

        return redirect(route('filieres.index'));
    }

    /**
     * Display the specified filiere.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere not found');

            return redirect(route('filieres.index'));
        }

        return view('filieres.show')->with('filiere', $filiere);
    }

    /**
     * Show the form for editing the specified filiere.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere not found');

            return redirect(route('filieres.index'));
        }

        return view('filieres.edit')->with('filiere', $filiere);
    }

    /**
     * Update the specified filiere in storage.
     *
     * @param int $id
     * @param UpdatefiliereRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefiliereRequest $request)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere not found');

            return redirect(route('filieres.index'));
        }

        $filiere = $this->filiereRepository->update($request->all(), $id);

        Flash::success('Filiere updated successfully.');

        return redirect(route('filieres.index'));
    }

    /**
     * Remove the specified filiere from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere not found');

            return redirect(route('filieres.index'));
        }

        $this->filiereRepository->delete($id);

        Flash::success('Filiere deleted successfully.');

        return redirect(route('filieres.index'));
    }
}
