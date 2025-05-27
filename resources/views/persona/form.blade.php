<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <!--<div class="form-group mb-2 mb20">
            <label for="id_persona" class="form-label">{{ __('Id Persona') }}</label>
            <input type="text" name="id_persona" class="form-control @error('id_persona') is-invalid @enderror" value="{{ old('id_persona', $persona?->id_persona) }}" id="id_persona" placeholder="Id Persona">
            {!! $errors->first('id_persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>-->
        <div class="form-group mb-2 mb20">
            <label for="nombre_completo" class="form-label">{{ __('Nombre Completo') }}</label>
            <input type="text" name="nombre_completo" class="form-control @error('nombre_completo') is-invalid @enderror" value="{{ old('nombre_completo', $persona?->nombre_completo) }}" id="nombre_completo" placeholder="Nombre Completo">
            {!! $errors->first('nombre_completo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
        </div>
        <div class="float-right">
            <a class="btn btn-info" href="{{ route('personas.index') }}"> {{ __('Volver') }}</a>
        </div>
    </div>
</div>