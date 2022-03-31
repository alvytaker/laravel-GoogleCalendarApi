@extends('master')

@section('body')

  <div class="container">
  
    <center>
      <div class="label">Editar evento</div>
    </center>
        <form method="POST" action="{{ route('updatecalendar', $event->id) }}">
        @method('PUT')
        @csrf
  
              <div class="modal-body" id="cont_modal">
  
                  <div class="form-group">
                    <label for="recipient-name label" class="label">Titulo Evento</label>
                    <input type="text" name="title" class="form-control" value="{{ $event->getSummary()}}" required>
                  </div>

                  <br>
                  <div class="form-group">
                    <label for="recipient-name" class="label">Descripcion</label>
                    <textarea class="form-control" name="description" required rows="8">{{ $event->getDescription()}}</textarea>
                  </div>

                  <br>
                  <label for="name" class="label">Fecha y hora de inicio</label>
                  <br>
                
                    <input name="start_date" class="form-control" value="{{Carbon\Carbon::parse($event->start->dateTime)->format('d-m-Y H:i')}}">

                  <br>
                  <label for="name" class="label">Fecha y hora de termino</label>
                  <br>
                    <input name="end_date" class="form-control" value="{{Carbon\Carbon::parse($event->end->dateTime)->format('d-m-Y H:i')}}">
                  
                 <br>
              <div>
                <a type="button" href="{{ route('cal.index') }}" class="btn btn-secondary">Cerrar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>

              </div>

         </form>

    </div>
@stop