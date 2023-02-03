<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fotos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="panel-heading-admin">
                    <div class="form-search">
                        <h5>Fazer upload de foto</h5>
                    </div>
                </div>
                <div class="panel-admin">
                    <div class="row btn-new-reset" id="user">
                        <div class="btn-hero">
                            <p><a href="{{route('admin.fotos.index')}}" class="btn btn-primary btn-assinar">Voltar</a></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px; margin-right: 10px;">
                        <div class="form-admin">
                            <form action="{{route('admin.fotos.store')}}" method="post" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                @if ($message = Session::get('msg'))
                                    <div class="alert alert-success">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @elseif($message = Session::get('erro'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="user-image mb-3 text-center">
                                    <div class="imgPreview d-flex"> </div>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="photoFile[]" class="custom-file-input" id="images" multiple="multiple">
                                    <label class="custom-file-label" for="images">Escolha as imagens</label>
                                </div>
                                <div class="custom-file mt-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text form-foto" for="aplic">Uso das Fotos</label>
                                        </div>
                                        <select class="custom-select form-foto" id="aplic" name="aplic" style="width: 180px;">
                                            <option selected value="">Escolher...</option>
                                            <option value="Apoio">Apoio</option>
                                            <option value="Evento">Evento</option>
                                            <option value="Fórmula">Fórmula</option>
                                            <option value="Notícia">Notícia</option>
                                            <option value="Redação">Redação</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="custom-file mt-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text form-foto" for="credito" >Crédito</label>
                                        </div>
                                        <input type="text" name="credito" class="form-foto" size="100"/>
                                    </div>
                                </div>
                                <div class="custom-file mt-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text form-foto" for="legenda">Legenda</label>
                                        </div>
                                        <input type="text" name="legenda"  class="form-foto" size="100"/>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                    Upload Imagens
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>
</x-app-layout>

