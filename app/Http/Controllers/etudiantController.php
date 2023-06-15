<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateetudiantRequest;
use App\Http\Requests\UpdateetudiantRequest;

use App\Models\filiere;
use App\Repositories\etudiantRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class etudiantController extends AppBaseController
{
    /** @var etudiantRepository $etudiantRepository*/
    private $etudiantRepository;

    public function __construct(etudiantRepository $etudiantRepo)
    {
        $this->etudiantRepository = $etudiantRepo;
    }

    /**
     * Display a listing of the etudiant.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $etudiants = $this->etudiantRepository->all();
        $filiere=filiere::all();


        return view('etudiants.index', ['etudiants'=> $etudiants,'filiere'=>$filiere]);
    }

    /**
     * Show the form for creating a new etudiant.
     *
     * @return Response
     */
    public function create()
    {
        $filieres=filiere::orderby('libelle')->pluck('libelle','id');
        return view('etudiants.create')->with('filieres',$filieres)->with('filiere', 0);

    }

    /**
     * Store a newly created etudiant in storage.
     *
     * @param CreateetudiantRequest $request
     *
     * @return Response
     */
    public function store(CreateetudiantRequest $request)
    {
        $input = $request->all();

        $etudiant = $this->etudiantRepository->create($input);

        Flash::success('Etudiant saved successfully.');

        return redirect(route('etudiants.index'));
    }

    /**
     * Display the specified etudiant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etudiant = $this->etudiantRepository->find($id);

        $filiere_id = $etudiant->filiere;

        $filiere= filiere::find($filiere_id);


        if (empty($etudiant)) {
            Flash::error('Etudiant not found');

            return redirect(route('etudiants.index'));
        }

        return view('etudiants.show', ['etudiant'=>$etudiant, 'filiere'=>$filiere]);
    }

    /**
     * Show the form for editing the specified etudiant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Flash::error('Etudiant not found');

            return redirect(route('etudiants.index'));
        }



        $filieres=filiere::orderby('libelle')->pluck('libelle','id');
        $filiere=$etudiant->filiere;
        return view('etudiants.edit')->with('etudiant', $etudiant)->with('filieres',$filieres)->with('filiere', $filiere);
    }

    /**
     * Update the specified etudiant in storage.
     *
     * @param int $id
     * @param UpdateetudiantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateetudiantRequest $request)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Flash::error('Etudiant not found');

            return redirect(route('etudiants.index'));
        }

        $etudiant = $this->etudiantRepository->update($request->all(), $id);

        Flash::success('Etudiant updated successfully.');

        return redirect(route('etudiants.index'));
    }

    /**
     * Remove the specified etudiant from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Flash::error('Etudiant not found');

            return redirect(route('etudiants.index'));
        }

        $this->etudiantRepository->delete($id);

        Flash::success('Etudiant deleted successfully.');

        return redirect(route('etudiants.index'));
    }
}
