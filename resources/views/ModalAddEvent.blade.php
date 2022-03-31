<!--ventana para Update--->
<div class="modal fade" id="AddEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Agregar Evento
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <form method="POST" action="{{ route('savecalendar') }}">
        @csrf
  
              <div class="modal-body" id="cont_modal">
  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Titulo Evento</label>
                    <input type="text" name="title" class="form-control"required>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Descripcion</label>
                    <textarea class="form-control" name="description" required rows="8"></textarea>
                  </div>

                  <br>
                  <label for="name">Fecha</label>
                  <br>
                    <input type="datetime-local" name="start_date" class="form-control"  required>
                    <input  type="datetime-local" name="end_date" class="form-control"   required>
                  
             

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

            </div>
         </form>
  
      </div>
    </div>
  </div>