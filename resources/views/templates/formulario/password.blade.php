<label class="{{ $class ?? null }}">
    <span> {{ $label ?? $input ?? "error" }} </span>
    {!! Form::password($input, $attributes) !!}
</label>