<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    /* Custom */

    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #343a40;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

</head>

<body class="text-center ">
    <form class="form-signin" action="<?= base_url('login/validation') ?>" method="POST">
        <!-- <img class="mb-4" src="/docs/4.2/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <div id="msg"></div>
        <h1 class="h3 mb-3 font-weight-normal text-white">Please sign in</h1>
        <label for="userId" class="sr-only">Login Id</label>
        <input type="text" id="userId" class="form-control" placeholder="Login ID" name="user_id" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <!-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div> -->
        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
        <a class="btn btn-success btn-block" href="#" role="button" data-toggle="modal"
            data-target="#exampleModalCenter">Aktivasi Akun</a>
        <p class="mt-5 mb-3 text-white">&copy; <?= date("Y") ?></p>
    </form>

    <!-- Modal Aktivasi-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">ID Activation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <form action="<?= base_url('activation') ?>" method="POST"> -->
                    <div class="form-group">
                        <input type="text" id="data-id" class="form-control" placeholder="Input User ID">
                    </div>
                    <!-- </form> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-activation">Cek User Id</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Set Password-->
    <div class="modal fade" id="makePassword" tabindex="-1" role="dialog" aria-labelledby="makePasswordTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="makePasswordTitle">Set Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('activation') ?>" method="POST">
                        <input type="hidden" id="validationKey" value="" class="form-control">
                        <div id="passMsg"></div>
                        <div class="form-group">
                            <input type="password" id="password-1" class="form-control" placeholder="Input Password">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password-2" class="form-control"
                                placeholder="Input Password Again">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-activation-password">Set Password</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    var base_url = window.location.origin + '/tugas_akhir/'; // change after upload server

    $("#data-id").keyup(function(e) {
        if (e.which == 13) {
            beginActivation();
        }
    })

    $('#btn-activation').click(function() {
        beginActivation();
    });

    function beginActivation() {
        $("#msg").html('');
        $("#data-id").focus();

        let key = $("#data-id").val();
        // console.log(base_url);
        $('#exampleModalCenter').modal('hide');

        $.ajax({
            url: "<?= base_url(); ?>" + 'users/cekId',
            method: 'POST',
            data: {
                'user_id': key
            },
            dataType: 'json',
            success: function(data) {

                if (data.error == 'false') {

                    if (data.password == '') {

                        $("#validationKey").val(data.user_id);
                        $('#makePassword').modal('show');
                    } else {

                        $("#msg").html(
                            `<div class="alert alert-success" role="alert">
                                User Already Active!
                                </div>`
                            )
                    }

                } else {

                    $("#msg").html(
                        `<div class="alert alert-danger" role="alert">
                            ` +
                        data.msg + `
                            </div>`)

                }
            }
        })
    }

    $('#btn-activation-password').click(function() {

        $('#passMsg').html('');


        let key = $("#validationKey").val();
        let password1 = $("#password-1").val();
        let password2 = $("#password-2").val();

        if (password1 != password2) {
            $('#passMsg').html(
                `<div class="alert alert-danger" role="alert">
                            Passwords don't match!
                        </div>`
                );

        } else {
            $.ajax({
                url: "<?= base_url(); ?>" + 'users/userValidation',
                method: 'POST',
                data: {
                    'user_id': key,
                    'password': password1
                },
                dataType: 'json',
                success: function(data) {
                    $("#msg").html(
                        `<div class="alert alert-success" role="alert">
                        ` +
                        data.msg + `
                        </div>`);
                    console.log(data);
                    $("#password-1").val('');
                    $("#password-2").val('');
                }
            });

            $('#makePassword').modal('hide');
        }

    })
    </script>

</body>

</html>