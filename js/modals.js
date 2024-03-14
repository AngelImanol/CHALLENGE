function actualizar_user(id) {
    const html2 = `
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-left" id="updateModalLabel">Update User
                <button type="button" class="close d-inline" data-dismiss="modal">&times;</button></h5>
            </div>
            <div class="modal-body text-left">
                <form form action="update.php" method="post" name="update_user">
                    <input type="hidden" name="accion" value="1">

                    <div class="form-group mb-2">
                        <label for="user-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="user-name" name="name" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="user-username" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="user-username" name="username" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="user-emai" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="user-email" name="email" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="user-phone" class="col-form-label">Number Phone:</label>
                        <input type="text" class="form-control" id="user-phone" name="phone" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="user-jobs" class="col-form-label">Jobs:</label>
                        <input type="text" class="form-control" id="user-jobs" name="jobs" required>
                    </div>
                    <input type="hidden" name="id" value="${id}"/>
                    <button type="button" class="btn btn-secondary text-right" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" value="Update" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
    `
    const modal = document.getElementById("modalContainer");
    modal.innerHTML=html2;
}
function actualizar_animal(id) {
    const html2 = `
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-left" id="updateModalLabel">Update Animal
                <button type="button" class="close d-inline" data-dismiss="modal">&times;</button></h5>
            </div>
            <div class="modal-body text-left">
                <form form action="update.php" method="post" name="update_user">
                    <input type="hidden" name="accion" value="2">

                    <div class="form-group mb-2">
                        <label for="animal_name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="animal_name" name="animal_name" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="animal_species" class="col-form-label">species:</label>
                        <input type="text" class="form-control" id="animal_species" name="animal_species" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="animal_age" class="col-form-label">age:</label>
                        <input type="text" class="form-control" id="animal_age" name="animal_age" required>
                    </div>
                    <input type="hidden" name="id" value="${id}"/>
                    <button type="button" class="btn btn-secondary text-right" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" value="Update" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
    `
    const modal = document.getElementById("modalContainer");
    modal.innerHTML=html2;
}