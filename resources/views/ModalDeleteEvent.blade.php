<!--ventana para Update--->
<div class="modal fade" id="deleteEvent{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Eliminar evento
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
  
        <form method="POST" action="{{ route('deletecalendar', $event->id) }}">
        @method('DELETE')
        @csrf
  
              <div class="modal-body" id="cont_modal">
  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Elimiar el Evento: </label>
                    <input type="text" name="summary" class="form-control" value="{{ $event->summary}}?" >
                  </div>

             
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>

            </div>
         </form>
  
      </div>
    </div>
  </div>