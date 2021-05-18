<x-plantilla>
    <x-slot name="titulo">Profesores</x-slot>
    <x-slot name="cabecera">Gestión de Profesores</x-slot>
    <x-mensajes />
    <a href="{{route('profesores.create')}}" class="btn btn-success"><i class="fas fa-user-plus"></i> Crear Profesor</a>
    <table class="table table-primary table-striped mt-2">
        <thead>
          <tr>
            <th scope="col">Detalles</th>
            <th scope="col">Apellidos y Nombre</th>
            <th scope="col">Localidad</th>
            <th scope="col" colspan=2 class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($profesores as $item)
          <tr>
            <th scope="row">
                <a href="{{route('profesores.show', $item)}}" class="btn btn-info"><i class="fas fa-info-circle"></i> Detalles</a>
            </th>
            <td>{{$item->apellidos}}, {{$item->nombre}}</td>
            <td>{{$item->localidad}}</td>
            <td class="text-center">
                <a href="{{route('profesores.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
              <form name="borrado" method="POST" action="{{route('profesores.destroy', $item)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-user-minus"></i> Borrar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-2">
          {{$profesores->links()}}
      </div>
</x-plantilla>