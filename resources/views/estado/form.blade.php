<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <!--<div class="form-group mb-2 mb20">
            <label for="id_estado" class="form-label">{{ __('Id Estado') }}</label>
            <input type="text" name="id_estado" class="form-control @error('id_estado') is-invalid @enderror" value="{{ old('id_estado', $estado?->id_estado) }}" id="id_estado" placeholder="Id Estado">
            {!! $errors->first('id_estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>-->
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $estado?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
        </div>
        <div class="float-right">
            <a class="btn btn-info" href="{{ route('estados.index') }}"> {{ __('Volver') }}</a>
        </div>
    </div>
</div> 