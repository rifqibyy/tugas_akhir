<?php

?>
<div class="row flex-column-reverse flex-md-row">
    <div class="col-md-7">
        <table class="table table-bordered">
            <tr>
                <th>NIM</th>
                <td><?= $profile['nim'] ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?= $profile['nama'] ?></td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td><?= $profile['jurusan_id'] ?></td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td><?= $profile['tmp_lahir'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?= $profile['tgl_lahir'] ?></td>
            </tr>
            <tr>
                <th>Agama</th>
                <td><?= $profile['agama'] ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?= $profile['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $profile['alamat'] ?></td>
            </tr>
            <tr>
                <th>Telpon</th>
                <td><?= $profile['telp'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $profile['email'] ?></td>
            </tr>
            <tr>
                <th></th>
                <td><button class="btn btn-primary btn-sm" id="editProfile">Edit</button></td>
            </tr>
        </table>
    </div>
    <?php ($profile['img'] != '') ? $pp = $profile['img'] : $pp = 'default.png' ?>
    <div class="col-md-5 text-center"><img src="<?php echo base_url('assets/img/' . $pp); ?>" width="200"></div>
</div>

<div class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="modalEditProfileTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditProfileeTitle">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="<?= base_url('mahasiswa/updateProfile') ?>" id="frm-update"
                    method="POST">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" readonly id="nim" class="form-control form-control-sm"
                            value="<?= $profile['nim'] ?>" name="nim" placeholder="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control form-control-sm" id="nama"
                            value="<?= $profile['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control form-control-sm" id="jurusan"
                            value="<?= $profile['jurusan_id'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <input type="text" name="tmp_lahir" class="form-control form-control-sm" id="tmp_lahir"
                            value="<?= $profile['tmp_lahir'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control form-control-sm" id="tgl_lahir"
                            value="<?= $profile['tgl_lahir'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control form-control-sm" id="jenis_kelamin"
                            value="<?= $profile['jenis_kelamin'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" name="agama" class="form-control form-control-sm" id="agama"
                            value="<?= $profile['agama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control form-control-sm" id="alamat"
                            value="<?= $profile['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telepon</label>
                        <input type="text" name="telp" class="form-control form-control-sm" id="telp"
                            value="<?= $profile['telp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control form-control-sm" id="email"
                            value="<?= $profile['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="img">Gambar</label>
                        <input type="file" class="form-control form-control-sm" name="img" id="img"
                            value="<?= $profile['img'] ?>">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-update-profile">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#editProfile").click(function() {
        $("#modalEditProfile").modal('show');
    })
    
    $(document).on("click", "#btn-update-profile", function(e) {
        //Prevent Instant Click  
        e.preventDefault();
        // Create an FormData object 
        var formData = $("#frm-update").submit(function(e) {
            return;
        });
        //formData[0] contain form data only 
        // You can directly make object via using form id but it require all ajax operation inside $("form").submit(<!-- Ajax Here   -->)
        var formData = new FormData(formData[0]);
        $.ajax({
            url: $('#frm-update').attr('action'),
            type: 'POST',
            data: formData,
            success: function(response) {
                $("#modalEditProfile").modal('hide');
                $("#content").html('');
            },
            contentType: false,
            processData: false,
            cache: false
        });
        return false;
    });

})
</script>