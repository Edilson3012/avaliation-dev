<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormUsuarioRequest;
use App\Models\Usuario;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    private $repository;

    public function __construct(Usuario $usuario)
    {
        $this->repository = $usuario;
    }

    public function index()
    {
        $usuarios = $this->repository->all();

        return view('usuario.index', [
            'usuarios' => $usuarios
        ]);
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(FormUsuarioRequest $request)
    {
        try {
            $dataUser = [
                'name' => $request->name,
                'birthday' => formatDateAndTime($request->birthday, 'Y-m-d'),
                'image' => $request->image
            ];

            $this->_validDateBirthDay($dataUser['birthday']);

            $dataUser['image'] = $this->_validateImage($request, $dataUser['image']);

            $this->repository->create($dataUser);

            return redirect()->route('usuario.index')->with('success', 'Usuário cadastrado com sucesso.');
        } catch (Exception $ex) {
            $error = [
                'message' => 'Ocorreu um erro ao salvar: ' . $ex->getMessage()
            ];
            return redirect()->back()->with('error', $error['message']);
        }
    }

    public function show($id)
    {
        try {
            $usuario = $this->repository->find($id);

            return view('usuario.show', [
                'usuario' => $usuario
            ]);
        } catch (Exception $ex) {
            $error = [
                'message' => 'Ocorreu um erro ao salvar: ' . $ex->getMessage()
            ];
            return redirect()->back()->with('error', $error['message']);
        }
    }

    public function edit($id)
    {
        $usuario = $this->repository->find($id);

        if (!$usuario)
            return redirect()->back();

        return view('usuario.edit', ['usuario' => $usuario]);
    }

    public function update(FormUsuarioRequest $request, $id)
    {
        $usuario = $this->repository->find($id);

        $dataUser = $request->except('_token');
        if (!$usuario)
            return redirect()->back();

        $dataUser['birthday'] = formatDateAndTime($dataUser['birthday'], 'Y-m-d');

        $this->_validDateBirthDay($dataUser['birthday']);

        $dataUser['image'] = $this->_validateImage($request, $usuario->image);

        $usuario->update($dataUser);

        return redirect()->route('usuario.index')->with('success', 'Usuário alterado com sucesso.');
    }

    public function destroy($id)
    {
        try {
            $usuario = $this->repository->find($id);

            if (!$usuario)
                return redirect()->back();

            $usuario->delete();

            return response()->json([
                'success' => true,
                'message' => "Usuário excluído com sucesso!",
            ]);
        } catch (Exception $ex) {
            $error = [
                'message' => 'Ocorreu um erro ao salvar: ' . $ex->getMessage()
            ];
            if ($ex->getCode() == 23000) {
                $error = [
                    'message' => 'Violação de restrição de integridade: 1062 Entrada duplicada.'
                ];
            }
            return redirect()->back()->with('error', $error['message']);
        }
    }

    private function _validDateBirthDay($date)
    {
        if ($date > date('Y-m-d')) {
            throw new Exception("Data de nascimento superior a data atual!");
        }
    }

    private function _validateImage($request, $image)
    {
        if (($request->file('image'))) {

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                Storage::delete($image);
                return $request->image->store('users');
            }
        }
        return $image;
    }
}
