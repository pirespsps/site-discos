@include('layouts.header', ['titulo' => "Listar"]) <!--var....-->

@yield('body')
<div class="container w-100 h-100 d-flex">

    <div class="bg-dark d-block column">
        @foreach ($multipleData as [$cover, $name, $value, $id])

            <div class="d-inline">
                <div class="d-flex">
                    <img src="{{ asset($cover) }}" class="h-25 w-25">
                <a href="{{ ($type == "disco" ? "discos" : $type == "banda") ? "bandas" : "musicas" }}/{{ $id }}" class="text-decoration-none text-white">
                    <h3>{{ $name }}</h3>
                </a>
                <h3 class="text-default">{{ $value }}</h3>
                </div>
                
            </div>

        @endforeach
    </div>


</div>