
<div class="modal" tabindex="-1" id="delete_modal">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">elimina piatto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <p class="{{ Route::currentRouteName() == 'admin.dishes.index' ? 'd-none' : '' }}">sei sicuro/a di voler eliminare definitivamente questo piatto "<span id="title-to-delete-def"></span>" ?</p>
              <p class="{{ Route::currentRouteName() == 'admin.trash' ? 'd-none' : '' }}">vuoi spostare "<span id="title-to-delete"></span>" nella pagina piatti eliminati ?</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annulla</button>
              <button id="delete-btn" type="button" class="btn btn-danger">si continua</button>
          </div>
      </div>
  </div>
</div>