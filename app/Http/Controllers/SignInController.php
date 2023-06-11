<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use App\Services\SignInService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SignInController extends Controller
{
    protected $signInService;
    protected $imageService;

    public function __construct(SignInService $signInService, ImageService $imageService)
    {
        $this->signInService = $signInService;
        $this->imageService = $imageService;
    }

    public function index()
    {
        return view('panel.login.index');
    }

    public function fetch()
    {
        $signIn = $this->signInService->getAll();
        return DataTables::of($signIn)
            ->editColumn('image', function ($data) {
                return "<img width='100' src='$data->image'/>";
            })
            ->editColumn('name', function ($data) {
                return $data->name . " " . $data->surname;
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteSignIn(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addColumn('update', function ($data) {
                return "<button onclick='updateSignIn(" . $data->id . ")' class='btn btn-warning'>Güncelle Modal</button>";
            })
            ->rawColumns(['image', 'name', 'delete', 'update'])
            ->make(true);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        // ImageService
        $data['image'] = $this->imageService->processImage($request);

        $result = $this->signInService->create($data);

        if (isset($result['errors'])) {
            return response()->json(['errors' => $result['errors']], 400); // 400 bad request
        }

        return response()->json(['user' => $result], 201); // 201 create success
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['image'] = $this->imageService->processUpdateImage($request);

        $result = $this->signInService->update($id, $data);
        if (isset($result['errors'])) {
            return response()->json(['errors' => $result['errors']], 400); // 400 bad request
        }

        if (isset($result['errors']) && in_array('User not found', $result['errors'])) {
            return response()->json(['errors' => $result['errors']], 404); // 404 not found
        }

        return response()->json(['user' => $result], 200);
    }


    public function getById(Request $request)
    {
        $id = $request->input('id');
        $user = $this->signInService->getById($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['user' => $user], 200);
    }


    public function delete(Request $request)
    {
        $id = $request->input('id');
        $result = $this->signInService->delete($id);

        if (!$result) {
            return response()->json(['errors' => ['User not found']], 404); // 404 not found
        }

        return response()->json([], 204); // 204 No Content
    }


}

