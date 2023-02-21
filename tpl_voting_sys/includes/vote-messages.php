<div id="db-vote-modal" class="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title">System głosowania</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<h5><?=$data['message']?></h5>
      </div>

    </div>
  </div>
</div>


<script>


$(function() {
    $('#db-vote-modal').modal('show');
});

</script>