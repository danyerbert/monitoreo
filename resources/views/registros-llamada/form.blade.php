<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="id_persona" class="form-label">{{ __('Operador') }}</label>
            <select name="id_persona" class="form-control form-select @error('id_persona') is-invalid @enderror" value="{{ old('id_persona', $registrosLlamada?->id_persona) }}" id="id_persona">
            @foreach ($personas as $persona)
                <option value="{{ $persona->id_persona }}">{{ $persona->nombre_completo }}</option>
            @endforeach
            </select>
            {!! $errors->first('id_persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-20 mb20">
            <label for="id_estado" class="form-label">{{ __('Estado') }}</label>
            <select name="id_estado" class="form-control form-select @error('id_estado') is-invalid @enderror" value="{{ old('id_estado', $registrosLlamada?->id_estado) }}" id="id_estado">
            @foreach ($estados as $estado)
                <option value="{{ $estado->id_estado }}">{{ $estado->estado }}</option>
            @endforeach
            </select>
            {!! $errors->first('id_estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <br>
        <div class="form-group mb-20 mb20">
            <label for="" class="form-label">{{ __('Fecha Contacto') }}</label>
            <p class="form-control">{{ $now->format('Y-m-d') }}</p>
            <input type="hidden" name="fecha_contacto" class="@error('fecha_contacto') is-invalid @enderror" value="{{ $now->format('Y-m-d') }}" id="fecha_contacto">
        </div>
        <!--<div class="form-group mb-2 mb20">
            <label for="fecha_contacto" class="form-label">{{ __('Fecha Contacto') }}</label>
            <input type="date" name="fecha_contacto" class="form-control @error('fecha_contacto') is-invalid @enderror" value="{{ old('fecha_contacto', $registrosLlamada?->fecha_contacto) }}" id="fecha_contacto" placeholder="{{ $now->format('Y-m-d') }}">
            {!! $errors->first('fecha_contacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>-->
        <div class="form-group mb-20 mb20">
            <label for="" class="form-label">{{ __('Hora Contacto') }}</label>
            <p class="form-control">{{ $now->format('H:i') }}</p>
            <input type="hidden" name="hora_contacto" class="@error('hora_contacto') is-invalid @enderror" value="{{ $now->format('H:i') }}" id="hora_contacto">
        </div>
        <!--<div class="form-group mb-2 mb20">
            <label for="hora_contacto" class="form-label">{{ __('Hora Contacto') }}</label>
            <input type="time" name="hora_contacto" class="form-control @error('hora_contacto') is-invalid @enderror" value="{{ old('hora_contacto', $registrosLlamada?->hora_contacto) }}" id="hora_contacto" placeholder="{{ $now->format('H:i') }}">
            {!! $errors->first('hora_contacto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>-->
        <div class="form-group mb-20 mb20">
            <label for="atendio_llamada" class="form-label">{{ __('Atendio Llamada') }}</label>
            <div class="form-check">
                <input class="form-check-input @error('atendio_llamada') is-invalid @enderror" type="radio" value="SI" name="atendio_llamada" id="atendio_llamada">
                <label class="form-check-label" for="checkDefault">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input @error('atendio_llamada') is-invalid @enderror" type="radio" value="NO" name="atendio_llamada" id="atendio_llamada">
                <label class="form-check-label" for="checkChecked">
                   No
                </label>
            </div>
            {!! $errors->first('atendio_llamada', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="observaciones" class="form-label">{{ __('Observaciones') }}</label>
            <input type="text" name="observaciones" class="form-control @error('observaciones') is-invalid @enderror" value="{{ old('observaciones', $registrosLlamada?->observaciones) }}" id="observaciones" placeholder="Observaciones">
            {!! $errors->first('observaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <button type="submit" class="btn btn-success">{{ __('Registrar') }}</button>
        </div>
        <div class="float-right">
            <a class="btn btn-info" href="{{ route('registros-llamadas.index') }}"> {{ __('Regresar') }}</a>
        </div>
    </div>
</div>