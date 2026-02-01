<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="icon-box text-danger border-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                    style="width: 60px; height: 60px; border: 2px solid;">
                    <i class="ri-delete-bin-line fs-32"></i>
                </div>
                <h4 class="mb-2 fw-bold text-dark">Confirm Deletion</h4>
                <p class="text-muted mb-4">Are you sure you want to delete this item? This action cannot be undone.</p>

                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-light w-100" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="confirmDeleteBtn"
                            class="btn btn-danger w-100 flex items-center justify-center gap-2">
                            <span id="deleteSpinner" class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                            <span id="deleteBtnText">Delete</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteModal = document.getElementById('deleteModal');
        if (deleteModal) {
            // Handle Modal Show - Set Action URL
            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var url = button.getAttribute('data-url');
                var form = deleteModal.querySelector('#deleteForm');
                form.action = url;

                // Reset button state when opening modal
                var btn = deleteModal.querySelector('#confirmDeleteBtn');
                var spinner = deleteModal.querySelector('#deleteSpinner');
                var text = deleteModal.querySelector('#deleteBtnText');

                if (btn) {
                    btn.disabled = false;
                    spinner.classList.add('d-none');
                    text.textContent = 'Delete';
                }
            });

            // Handle Form Submit - Show Spinner
            var form = deleteModal.querySelector('#deleteForm');
            if (form) {
                form.addEventListener('submit', function() {
                    var btn = deleteModal.querySelector('#confirmDeleteBtn');
                    var spinner = deleteModal.querySelector('#deleteSpinner');
                    var text = deleteModal.querySelector('#deleteBtnText');

                    if (btn) {
                        btn.disabled = true;
                        spinner.classList.remove('d-none');
                        text.textContent = 'Deleting...';
                    }
                });
            }
        }
    });
</script>
