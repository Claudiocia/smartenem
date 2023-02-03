<?php

namespace App\Http\Controllers;

use App\Forms\UserForm;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if($search == null){
            $users = User::orderBy('name', 'ASC')->paginate();
        }else{
            $users = User::where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%')
                ->orWhere('smartphone', 'LIKE', '%'.$search.'%')
                ->paginate(15);
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function dashboardAdmin()
    {
        return view('/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $form = \FormBuilder::create(UserForm::class,[
            'url' => route('admin.users.store'),
            'method' => 'POST',
        ]);
        return view('admin.users.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'smartphone' => ['required', 'unique:users'],
            'valid' => Rule::requiredIf(fn () => $data['role'] == 3),
        ], [
            'email.unique' => 'Este email já está cadastrado no sistema!',
            'smartphone.unique' => 'Já existe um cadastro para este celular!',
            'valid.required' => 'É preciso informar a data de validade',
        ])->validate();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'smartphone' => $data['smartphone'],
            'role' => $data['role'],
            'password' => Hash::make('secret'),
            'valid' => $data['valid'],
        ]);

        $request->session()->flash('msg', 'Usuário Criado com sucesso');
        return redirect()->route('admin.users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user)
    {
        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('admin.users.update', [ 'user' => $user->id]),
            'method' => 'PUT',
            'model' => $user,
            'data' => ['id' => $user->id],
        ]);

        return view('admin.users.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
            'smartphone' => ['required', Rule::unique('users')->ignore($user->id)],
            'valid' => Rule::requiredIf(fn () => $data['role'] == 3),
        ], [
            'email.unique' => 'Este email já está cadastrado no sistema!',
            'smartphone.unique' => 'Já existe um cadastro para este celular!',
            'valid.required' => 'É preciso informar a data de validade',
        ])->validate();

        $user->fill($data);
        $user->save();

        $request->session()->flash('msg', 'Usuário atualizado com sucesso!');
        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return RedirectResponse
     */
    public function destroy(Request  $request, User $user)
    {
        $user->delete();
        $request->session()->flash('msg', 'Usuário deletado com sucesso');
        return redirect()->route('admin.users.index');
    }
}
