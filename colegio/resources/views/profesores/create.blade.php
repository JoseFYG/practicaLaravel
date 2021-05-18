<x-plantilla>
    <x-slot name="titulo">Gestión Profesores</x-slot>
    <x-slot name="cabecera">Crear Profesores</x-slot>
    <x-errores />
    <form name="fc" method="POST" action="{{route('profesores.store')}}" class="p-4 text-light bg-primary mt-3">
    @csrf
    <x-form-input name="nombre" label="Nombre" />
    <x-form-input name="apellidos" label="Apellidos" />
    <x-form-input name="email" label="Correo Electrónico" type="email"/>
    <x-form-input name="localidad" label="Localidad"/>
    <div class="mt-3">
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
    <button type="reset" class="btn btn-warning mr-5"><i class="fas fa-broom"></i> Limpiar</button>
    <a class="btn btn-info mx-3" href="{{route('profesores.index')}}"><i class="fas fa-backward"></i> Volver</a>
    </div>
    </form>
</x-plantilla>