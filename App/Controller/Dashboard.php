<?php

namespace App\Controller;

use App\Model\Inversion;
use App\System\Controller;
use Intervention\Image\ImageManagerStatic as Imagex;

class Dashboard extends Controller
{
    protected $inversionModel;

    public function __construct()
    {
        $this->middleware($this->sessionGet('user'), ['/dashboard']);
        $this->inversionModel = new Inversion();
    }

    public function index()
    {
        $inversiones = $this->inversionModel->where('estado', 1)->findAll();

        return view('dashboard/index', [
            'inversiones' => $inversiones
        ]);
    }

    public function create()
    {
        return view('dashboard/create', []);
    }

    public function store()
    {
        $data = $this->request()->isPost();

        $valid = $this->validate($data, [
            'features' => 'required|alpha_numeric_space',
            'cant' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($valid !== true) {
            return view('dashboard/create',  [
                'err' =>  $valid,
                'data' => (object)$data,
            ]);
        } else {
            if ($data['photo']["tmp_name"] !== '') {

                $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

                $image = Imagex::make($data['photo']["tmp_name"])->fit(300, 500);
                $data['photo'] = $nombreImagen;

                if (!is_dir(DIRIMG)) {
                    mkdir(DIRIMG);
                }

                $image->save(DIRIMG . $nombreImagen);
            } else {
                $data['photo'] = null;
            }

            $result = $this->inversionModel->create($data);

            if ($result["result"] == 'ok') {
                return $this->redirect('dashboard');
            }
        }

        return view('dashboard/create',  [
            'err' =>  $valid,
            'data' => (object)$data,
        ]);
    }

    public function edit()
    {
        $id = $this->request()->isGet();
        $inversion = $this->inversionModel->where('id', $id["id"])->first();

        return view('dashboard/edit', [
            'inversion' => $inversion
        ]);
    }

    public function update()
    {
        $data = $this->request()->isPost();
        $inversion = $this->inversionModel->where('id', $data['id'])->first();

        $valid = $this->validate($data, [
            'features' => 'required|alpha_numeric_space',
            'cant' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($valid !== true) {

            return view('dashboard/edit',  [
                'err' =>  $valid,
                'data' => (object)$data,
                'id' => $data['id']
            ]);
        } else {

            if ($data['photo']["tmp_name"] !== '') {

                $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

                $image = Imagex::make($data['photo']["tmp_name"])->fit(300, 500);
                $data['photo'] = $nombreImagen;

                if (!is_dir(DIRIMG)) {
                    mkdir(DIRIMG);
                }

                if (file_exists(DIRIMG . $inversion->photo)) {
                    unlink(DIRIMG . $inversion->photo);
                }

                $image->save(DIRIMG . $nombreImagen);
            } else {
                $data['photo'] = null;
            }

            $result = $this->inversionModel->update($data['id'], $data);
            if ($result["result"] == 'ok') {
                return $this->redirect('dashboard');
            }
        }

        return view('dashboard/edit',  [
            'err' =>  $valid,
            'data' => (object)$data,
        ]);
    }

    public function destroy()
    {
        $data = $this->request()->isGet();
        $estado = ['estado' => 0];

        $result = $this->inversionModel->update($data['id'], $estado);
        if ($result["result"] == 'ok') {
            return $this->redirect('dashboard');
        }
    }


    public function eliminados()
    {
        $inversiones = $this->inversionModel->where('estado', 0)->findAll();

        return view('dashboard/eliminados', [
            'inversiones' => $inversiones
        ]);
    }

    public function ver()
    {
        $id = $this->request()->isGet();
        $inversion = $this->inversionModel->where('id', $id["id"])->first();

        return view('dashboard/ver', [
            'inv' => $inversion
        ]);
    }
}
