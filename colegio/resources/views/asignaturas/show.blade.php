  <x-plantilla>
    <x-slot name="titulo">Asignatura {{$asignatura->id}}</x-slot>
    <x-slot name="cabecera">Detalles Asignatura {{$asignatura->id}}</x-slot>
    <div class="row justify-content-center">
    <div class="card mt-3" style="width: 34rem;">
        <div class="card-body">
          <h4 class="card-title text-center">{{$asignatura->nombre}} - <a href="{{route('profesores.show', $asignatura->profesor->id)}}">{{$asignatura->profesor->apellidos.", ".$asignatura->profesor->nombre}}</a></h4>
          <h6 class="card-subtitle mb-2 text-muted text-center mt-1">Créditos: {{$asignatura->creditos}}</h6>
          <p class="card-text text-center">{{$asignatura->descripcion}}</p>
          <div class="row justify-content-rigth">
              <a class="btn btn-info mt-2" onclick="window.history.back()"><i class="fas fa-backward"></i> Volver</a>
          </div>
        </div>
    </div>
    </div>
</x-plantilla>