@include('layouts.header', ['titulo' => $titulo])

@yield('body')

<div class="w-75 h-75 bg-dark mx-auto mt-4 rounded-5 rounded-bottom" style="min-height:84vh">
    <h2 class="text-white w-100 p-3 m-3">Criar {{ $type }}s</h2>
    <form method="POST" action={{ route($type."s.store") }} class="p-3 m-3" enctype="multipart/form-data">
        @csrf

        <div class="d-flex w-100">

            <!-- imagem (botar input com js depois...) -->
            <div class="me-4">
                <div id="uploadDiv" class="d-block p-1 bg-primary" style="min-height: 30vh; min-width: 15vw;">
                    <img id="previewImg" src="" style="width: 100%; height: 100%;">
                </div>
            </div>
            <input type="file" name="fileInput" id="fileInput" accept="image/*" style="display: none;" required>

            <!-- input -->
            <div class="w-100 m-3">

                <div class="d-block">
                    <label for="nome" class="text-white">Nome</label>
                    <input name="nome" type="text" class="bg-secondary rounded-pill w-100" style="height:5.3vh;">
                </div>

                <div class="d-flex mt-4">
                    <div class="d-block me-3">
                        <label for="ano" class="text-white">Ano</label>
                        <input name="ano" type="number" class="bg-secondary rounded-pill w-100" style="height:5.3vh;">
                    </div>

                    @if ($type == "banda")
                        <div class="d-block">
                            <label for="local" class="text-white">Local</label>
                            <input name="local" type="text" class="bg-secondary rounded-pill w-100" style="height:5.3vh;">
                        </div>

                        <div class="mt-3 mx-2">
                            <label for="tag" class="text-white">Tag</label>
                            <select name="tag" id="tag" class="bg-secondary rounded-pill w-50 mx-2 text-white" style="height: 4vh">
                                @foreach ($tags as $tag)
                                    <option value={{ $tag['id'] }} class="text-white">
                                        {{$tag['value']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    @endif
                </div>
            </div>
        </div>

        @if ($type == "disco")


            <div class ="mt=4">
                <label for="tag" class="text-white">Tag</label>
                <select name="tag" id="tag" class="bg-secondary rounded-pill w-50 mt-2 mx-2 text-white" style="height: 4vh">
                    @foreach ($tags as $tag)
                        <option value={{ $tag['id'] }} class="text-white">
                            {{$tag['value']}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-block mt-4">
                <div>
                    <label for="banda" class="text-white">Banda</label>
                    <select name="banda" id="banda" class="bg-secondary rounded-pill w-50 mx-2 text-white" style="height: 4vh">
                        @foreach ($bandas as $banda)
                            <option value={{ $banda['id'] }} class="text-white">
                                {{$banda['nome']}}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="mt-3" id="tracks">

                    <div>
                        <label class="text-white" for="track1">Track 1</label>
                        <input class="w-50 bg-secondary rounded-pill m-1 text-white" type="text" id="track1" name="track[]"
                            required>
                        <input placeholder="Duração mm:ss" class="w-25 bg-secondary rounded-pill text-white m-1" type="text"
                            id="time1" name="time[]" required>
                    </div>

                </div>
            </div>
        @endif

        <div class="w-25 h-25 mt-4 mx-auto">
            <input class="btn btn-primary w-100 h-100 mx-auto" type="submit">
        </div>

    </form>

    <script type="module" src="{{ asset('js/createLayout.js') }}"></script>

</div>