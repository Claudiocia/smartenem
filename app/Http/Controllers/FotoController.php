<?php

namespace App\Http\Controllers;

use App\Forms\FotoForm;
use App\Models\Foto;
use App\Utils\DefaultFunctions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $aplic = $request->get('aplic');
        if ($search == null && $aplic == null){
            $fotos = Foto::orderBy('id', 'DESC')->paginate(8);
            return view('admin.fotos.index', compact('fotos'));
        }elseif ($search != null && $aplic == null){
            $fotos = Foto::where('name_orig', 'LIKE', '%'.$search.'%')
                ->orWhere('legenda', 'LIKE', '%'.$search.'%')
                ->orWhere('credito', 'LIKE', '%'.$search.'%')
                ->orderBy('id', 'DESC')->paginate(8);
            return view('admin.fotos.index', compact('fotos'));
        }elseif ($search != null && $aplic != null){
            $fotos = Foto::where('aplic', '=', $aplic)
                ->orWhere('name_orig', 'LIKE', '%'.$search.'%')
                ->orWhere('legenda', 'LIKE', '%'.$search.'%')
                ->orWhere('credito', 'LIKE', '%'.$search.'%')
                ->orderBy('id', 'DESC')->paginate(8);
            return view('admin.fotos.index', compact('fotos'));
        }elseif($search == null && $aplic != null){
            $fotos = Foto::aplic($aplic)->orderBy('id', 'DESC')->paginate(8);
            return view('admin.fotos.index', compact('fotos'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.fotos.create');
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
        //dd($data);

        $request->validate([
            'photoFile.*' => 'image|mimes:jpeg,jpg,png,gif',
            'aplic' => $data['aplic'] == null ? ['required'] : '',
        ],
            [
                'photoFile.*.mimes' => 'O arquivo precisa ser no formato de imagens',
                'file.max' => 'O tamanho do arquivo excede o limite máximo',
                'aplic.required' => 'Precisa escolher o uso da foto',
            ]);

        //dd($data);

        //max:2048
        if ($request->hasFile('photoFile')){
            foreach($request->file('photoFile') as $file)
            {
                $origName = $file->getClientOriginalName();

                if ($file->getSize() > 2048){
                    $width = 800;
                    $heigth = 600;

                    list($width_oring, $heigth_orig) = getimagesize($file);
                    $ratio_orig = $width_oring/$heigth_orig;

                    if($width/$heigth > $ratio_orig){
                        $width = $heigth*$ratio_orig;
                    }else{
                        $heigth = $width/$ratio_orig;
                    }
                    $img = Image::make($file)->resize($width, $heigth);
                    $img->save($file);
                }else{
                    $img = Image::make($file);
                    $img->save($file);
                }
                $name = md5("-{$file->getClientOriginalName()}")."-".time().".{$file->guessExtension()}";
                $pasta = DefaultFunctions::tirarAcentos($request['aplic']);
                $file->move(public_path().'/uploads/'.$pasta, $name);

               // 'name_orig', 'name', 'path', 'aplic', 'credito', 'legenda',

                $fotoModel = new Foto();
                $fotoModel->name = $name;
                $fotoModel->path = '/uploads/'.$pasta.'/'.$name;
                $fotoModel->name_orig = $origName;
                $fotoModel->aplic = $request['aplic'];
                $fotoModel->credito = $data['credito'];
                $fotoModel->legenda = $data['legenda'];

                $fotoModel->save();
            }
            return back()->with('msg', 'Fotos salvas com sucesso');
        }else {
            return back()->with('erro', 'Selecione pelo menos um arquivo!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  Foto $foto
     * @return View
     */
    public function show(Foto $foto)
    {
        return view('admin.fotos.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Foto $foto
     * @return View
     */
    public function edit(Foto $foto)
    {
        $form = \FormBuilder::create(FotoForm::class, [
            'url' => route('admin.fotos.update', ['foto' => $foto->id]),
            'method' => 'PUT',
            'model' => $foto,
            'data' => ['id' => $foto->id]
        ]);

        return view('admin.fotos.edit', compact('form', 'foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Foto $foto
     * @return RedirectResponse
     */
    public function update(Request $request, Foto $foto)
    {
        $data = $request->all();
        //dd($data);
        \Validator::make($data, [
            'name_orig' => ['required'],
            'aplic' => ['required'],
        ], [
            'name_orig.required' => 'Informe um nome de referencia para a imagem',
            'aplic.required' => 'Precisa escolher o uso da foto',
        ])->validate();

        $foto->fill($data);
        $foto->save();
        $request->session()->flash('msg', 'Dados da foto atualizados');

        return redirect()->route('admin.fotos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Foto $foto
     * @return RedirectResponse
     */
    public function destroy(Foto $foto, Request $request)
    {
        if(\File::exists(public_path().$foto->path)){
            \File::delete(public_path().$foto->path);
        }else{
            $request->session()->flash('msg', 'Esta foto não existe no file e seu registro foi apagado!');
            $foto->delete();
            return redirect()->route('admin.fotos.index');
        }
        $foto->delete();
        $request->session()->flash('msg', 'Foto deletada com sucesso');
        return redirect()->route('admin.fotos.index');
    }
}
