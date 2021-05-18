  <x-plantilla>
    <x-slot name="titulo">Profesor {{$profesore->id}}</x-slot>
    <x-slot name="cabecera">Detalles Profesor {{$profesore->id}}</x-slot>
    <div class="row justify-content-center">
    <div class="card mt-3" style="width: 24rem;">
        <div class="card-body">
          <h4 class="card-title text-center">{{$profesore->nombre." ".$profesore->apellidos}}</h4>
          <h6 class="card-subtitle mb-2 text-muted text-center mt-1">{{$profesore->localidad}}</h6>
          <p class="card-text text-center">{{$profesore->email}}</p>
          <p class="card-text text-justify">
              <b>Asignaturas</b>
              <ul>
                  @foreach($profesore->asignaturas as $item)
                  <li><a href="{{route('asignaturas.show', $item)}}">{{$item->nombre}}</a></li>
                  @endforeach
              </ul>
          </p>
          <div class="row justify-content-rigth">
              <a class="btn btn-info mt-2" onclick="window.history.back()"><i class="fas fa-backward"></i> Volver</a>
          </div>
        </div>
    </div>
    </div>
</x-plantilla>