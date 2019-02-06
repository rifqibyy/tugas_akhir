<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tugas Akhir</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!-- datatables -->
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    
    <script defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script defer="defer" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script defer="defer" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script defer="defer" src="<?= base_url('assets/js/script.js') ?>"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-dark text-white border-right" id="sidebar-wrapper">
            <div class="sidebar-heading ">Start Bootstrap </div>
            <div class="list-group list-group-flush">
                <a href="javascript:void(0)" class="list-group-item list-group-item-action bg-dark text-white text-muted" link="<?= base_url("admin/home/") ?>" >Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" link="<?= base_url("admin/home/dataMahasiswa") ?>">Data Mahasiswa</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" link="<?= base_url("admin/home/product") ?>">Data Relasi</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Status</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg  navbar-dark bg-dark  border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" id="profile" href="#">Profile</a>
                                <!-- <a class="dropdown-item" href="#">Another action</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('signout')?>" onclick='return confirm("Signout?")'>Signout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 id="head-title" class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <!-- <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button> -->
                        <div id="page-link"></div>
                    </div>
                </div>

                <div id="content"></div>
                <!-- <p>The starting state of the menu will appear collapsed on smaller screens, and will appear
                    non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is
                    optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID
                    which will toggle the menu when clicked.</p> -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->
    <script>

    $(document).ready(function(){

        if("<?= $_SESSION['role_id'] ?>" == "1") {
            var link = "<?= base_url('admin/home/'); ?>";
        } else if ("<?= $_SESSION['role_id'] ?>" == "2") {
            var link = "<?= base_url('mahasiswa'); ?>";
        }

        $.ajax({
            url: link,
            dataType: 'html',
            success: function(data) {
                $("#content").html(data);
            }
        })

        $(".list-group-item").on('click', function() {
            $("#content").html('');
            let test = $(this).text();
            // .replace(/\s+/g, '');

            let href = $(this).attr("link");

            console.log(href);

            $(".list-group-item").removeClass("text-muted");

            $(this).addClass("text-muted");

            $("#head-title").html("");
            $("#head-title").html(test);

            $.ajax({
                url: href,
                dataType: 'html',
                success: function(data) {
                    $("#content").html(data);
                }
            })

        })

        $("#profile").click(function(){
            openProfile();
        })

        function openProfile(){
            $("#head-title").text("Profile");
            let role = "<?= $_SESSION['role_id'] ?>";
            let url;
            if(role == "2"){
                url = "<?= base_url() ?>" + "mahasiswa/profile";
            }
            $.ajax({
                url : url,
                typeData : "html",
                data : {
                    user_id : "<?= $_SESSION['user_id'] ?>"
                },
                success: function(html){
                    $("#content").html(html);
                }
            })
        }

    })

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>