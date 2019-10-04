<label class="{{ $class ?? null }}">
    <span> {{ $label ?? $select ?? "error" }} </span>
    {!! Form::select($select, $value ?? []) !!}
</label>