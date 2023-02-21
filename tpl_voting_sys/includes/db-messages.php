<div id="db-error-modal" class="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title">Coś poszło nie tak</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><?=$data['message']?></p>
      </div>

    </div>
  </div>
</div>


<script>


$(function() {
    $('#db-error-modal').modal('show');
});

</script>
