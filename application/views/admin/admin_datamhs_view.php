<table id="mhs-table" class="table table-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 1 ; $i <= 100; $i++) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $i . $i . $i ?></td>
            <td>Udin <?= $i ?></td>
            <td>IK <?= $i ?></td>
            <td>
                <a id="btnDetailMhs" class="badge badge-secondary" data-toggle="modal" href="#" class="badge badge-dark"
                    data-target="#exampleModal" data-id="<?= $i ?>">Edit</a></td>
        </tr>
        <?php endfor; ?>
    </tbody>

</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mhs-data">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Mhs-->
<div class="modal fade" id="addMhs" tabindex="-1" role="dialog" aria-labelledby="addMhsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMhsTitle">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" id="mhs-id-add" class="form-control" placeholder="Input User ID">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-add-mhs">Tambah Mahasiswa</button>
            </div>
        </div>
    </div>
</div>

<!-- modal success -->
<div class="modal fade" id="add-success" tabindex="-1" role="dialog" aria-labelledby="add-successLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-successLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    A simple success alert—check it out!
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $("#page-link").html(
        `<a href="#" id="add-mhs" class="btn btn-sm btn-outline-secondary">Tambah Mahasiswa</a>`);

    $('#mhs-table').DataTable({
        responsive: true
    });

    $("#mhs-table").on("click", "#btnDetailMhs", function() {
        let id = $(this).data("id");
        console.log(id);
        $(".mhs-data").html(id);
    })

    $("#page-link").on("click", "#add-mhs", function() {
        $("#addMhs").modal("show");
    })

    $("#btn-add-mhs").on("click", function() {
        $("#addMhs").modal("hide");
        let idMhs = $("#mhs-id-add").val();

        console.log(idMhs);

        $.ajax({
            url: "<?= base_url() ?>users/addUserMhs",
            method: "POST",
            data: {
                user_id: idMhs
            },
            success: function() {
                console.log("add succes");
                swal("Success", "User Added", "success");
            }
        })
    })

});
</script>