@include('layouts.header')

@yield('body')
<div class="container w-100 h-100">

    <div class="bg-dark w-25 p-4 vh-100 justify-content-start d-block mt-3 mb-3 border border-primary">
        <img src="@yield('cover', 'default')" class="p-3 w-100 h-50 justify-content-center bg">
        <div class="text-default d-block">
            <div>Gêneros: @yield('generos')</div>
            <div>Duração: @yield('duracao')</div>
        </div>
        <div class="text-default d-block text-center">
            <div class="stars"><!-- botar pra deixar as estrelas dinamicas depois -->
                @for ($i = 1; $i<=5;$i++)
                    <img class="w-25 h-25" src="{{ asset('images/whiteStarIcon.png') }}">
                @endfor
            </div>
            <div class="stars">Sua Nota</div>
        </div>

        <div class="text-default d-flex text-center mt-5 mb-5">
            <div>
                @if (!$isListen)
                    <img class="w-75 h-50" src="{{ asset('images/whiteEarIcon.png') }}">
                @else
                    <img class="w-75 h-50" src="{{ asset('images/primaryEarIcon.png') }}">
                @endif
                <p>Ouvir Depois</p>
            </div>

            <div>
                @if (!$isLiked)
                    <img class="w-75 h-50" src="{{ asset('images/whiteHeartIcon.png') }}">
                @else
                    <img class="w-75 h-50" src="{{ asset('images/primaryHeartIcon.png') }}">
                @endif
                <p>Favoritar</p>
            </div>

            <div>
                @if (!$hasCommentary)
                    <img class="w-75 h-50" src="{{ asset('images/whiteCommentaryIcon.png') }}">
                @else
                    <img class="w-75 h-50" src="{{ asset('images/primaryCommentaryIcon.png') }}">
                @endif
                <p>Comentar</p>
            </div>

        </div>

    </div>

</div>