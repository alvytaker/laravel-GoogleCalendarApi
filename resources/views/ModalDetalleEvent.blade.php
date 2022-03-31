<!--ventana para Update--->
<div class="modal fade" id="detalleEvent{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
          <h6 class="modal-title titulomodal" style="color: #fff; text-align: center;">
              Detalles Información
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
              <div class="modal-body" id="cont_modal">
  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Titulo Evento</label>
                    <input type="text" name="title" class="form-control" value="{{ $event->summary}}" readonly=»readonly» required>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Descripcion</label>
                    <textarea class="form-control" name="description" required rows="8" readonly=»readonly»>{{ $event->description }}</textarea>
                  </div>

                  <br>
                  <label for="name">Fecha y hora inicio</label>
                  <br>
                    <input  name="start" class="form-control" value="{{Carbon\Carbon::parse($event->start->dateTime)->format('d-m-Y H:i')}}" readonly=»readonly» >

                  <br>
                  <label for="name">Fecha y hora termino</label>
                  <br>
                    <input  name="end" class="form-control" value="{{Carbon\Carbon::parse($event->end->dateTime)->format('d-m-Y H:i')}}" readonly=»readonly»>

                    <br>
                    <label for="name">Fecha y hora de la creacion del evento</label>
                    <br>
                      <input  name="end" class="form-control" value="{{Carbon\Carbon::parse($event->created)->format('d-m-Y H:i')}}" readonly=»readonly»>
                  
          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>

              </div>

        
  
      </div>
    </div>
  </div>