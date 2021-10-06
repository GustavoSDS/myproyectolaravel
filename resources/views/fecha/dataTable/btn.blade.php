<form action="{{ route('fecha.destroy', $id) }}" method="post">
    @csrf
    @method('DELETE')
    <div class="flex -mx-3">
        <div class="w-2/6 h-full">
            <a title="Editar" href="{{ route('fecha.edit', $id) }}">
                <span class="text-blue-600">
                <i class="fas fa-edit hover:scale-125 text-md"></i></span>
            </a>
        </div>
        <div class="w-2/6 h-4">
            <a title="Ver" href="{{ route('fecha.show', $id) }}">
                <span class="text-green-600"><i class="fas fa-eye hover:scale-125 text-md"></i></span>
            </a>
        </div>
        <div class="w-2/6 h-4">
            <button title="Eliminar"
            onclick="return confirm('Desea eliminar?')">
                <span class="text-red-600"><i class="fas fa-trash hover:scale-125 text-md"></i></span>
            </button>
        </div>
    </div>
</form>
