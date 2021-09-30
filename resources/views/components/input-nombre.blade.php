<input type="text" name="nombre" value="{{ Request::old('nombre') }}" required maxlength="20" pattern="[A-Za-z ]+"
    title="Obligatorio. Máximo 20 carácteres. Solo Letras."
    class="inputs-datos"
    placeholder="John">
