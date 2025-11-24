@include('layouts.header', ['titulo' => $titulo])

@yield('body')

<div class="w-75 h-75 bg-dark mx-auto mt-4 rounded-5 rounded-bottom" style="min-height:84vh">
    <h2 class="text-white w-100 p-3 m-3">Criar {{ $type }}s</h2>
    <form class="p-3 m-3">

    <div class="d-flex w-100">

        <!-- imagem (botar input com js depois...) -->
        <div class="me-4"> 
            <div class="d-block p-1 bg-primary" 
                 style="min-height: 30vh; min-width: 15vw;">
                <img src="" style="width: 100%; height: 100%;">
            </div>
        </div>

        <!-- input -->
        <div class="w-100 m-3">
            
            <div class="d-block">
                <label for="nome" class="text-white">Nome</label>
                <input name="nome" type="text" 
                       class="bg-secondary rounded-pill w-100" 
                       style="height:5.3vh;">
            </div>

            <div class="d-flex mt-4">
                <div class="d-block me-3">
                    <label for="ano" class="text-white">Ano</label>
                    <input name="ano" type="text" 
                           class="bg-secondary rounded-pill w-100" 
                           style="height:5.3vh;">
                </div>

                <div class="d-block"> <!--pegar do banco e fazer select depois...-->
                    <label for="tag" class="text-white">Tag</label>
                    <input name="tag" type="text" 
                           class="bg-secondary rounded-pill w-100" 
                           style="height:5.3vh;">
                </div>
            </div>
        </div>
    </div>

    @if ($type == "disco")
        <div class="h-100">

        </div>

        <div class="d-block">
                <label for="banda" class="text-white">Banda</label>
                <input name="banda" type="text" 
                       class="bg-secondary rounded-pill w-100" 
                       style="height:5.3vh;">
            </div>
    @endif

</form>

</div>