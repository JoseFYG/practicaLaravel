<x-plantilla>
    <x-slot name="titulo">Gestión Asignaturas</x-slot>
    <x-slot name="cabecera">Editar Asignaturas</x-slot>
    <x-errores />
    <form name="fc" method="POST" action="{{route('asignaturas.update', $asignatura)}}" class="p-4 text-light bg-primary mt-3">
    @csrf
    @method("PUT")
    @bind($asignatura)
    <x-form-input name="nombre" label="Nombre" />
    <x-form-input name="creditos" label="Créditos" />
    <x-form-textarea name="descripcion" label="Descripción" />
    <x-form-select name="profesor_id" :options="$misProfesores" label="Profesor"/>
    <div class="mt-3">
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
    <button type="reset" class="btn btn-warning mr-5"><i class="fas fa-broom"></i> Limpiar</button>
    <a class="btn btn-info mx-3" href="{{route('asignaturas.index')}}"><i class="fas fa-backward"></i> Volver</a>
    </div>
    </form>
</x-plantilla>