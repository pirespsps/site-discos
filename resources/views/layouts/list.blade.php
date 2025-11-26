@include('layouts.header', ['titulo' => "Listar"]) <!--var....-->

@yield('body')
<div class="container w-100 h-100 d-flex">

    <div class="bg-dark d-block w-100 h-100 column p-3">
        @foreach ($multipleData as [$cover, $name, $value, $id])

            <div class="bg-dark w-75 h-25 rounded mh-5 mt-2 p-3 d-flex border border-primary">
                    <div class = "d-block w-25 h-50">
                        <img src="{{ asset('storage/' . $cover) }}" class="h-100 w-100 justify-content-center bg">
                    </div>
                <a href="{{ ($type == "disco" ? "discos" : $type == "banda") ? "bandas" : "musicas" }}/{{ $id }}" class="text-decoration-none text-white p-3 h-25">
                    <h3>{{ $name }}</h3>
                </a>
                <h3 class="text-default pt-3 h-25" >{{ $value }}</h3>
                
                
            </div>

        @endforeach
    </div>


</div>