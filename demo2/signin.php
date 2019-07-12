<?php
include('connection_database.php');
if(isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = mysqli_query($conn, "select * from users where email='$email' and password='$password'");

    $result_query = mysqli_query($conn, $sql);

    if ($result_query == 0) {
        header("location:index.html");
    } else {
        echo "Kullanıcı bulunamadı.";
    }
}
?>

<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="../assets/app/custom/login/login-v3.default.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="../assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="../assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="../assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="../assets/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="../assets/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="../assets/demo/default/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="../assets/demo/default/skins/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="../assets/media/logos/favicon.ico" />

</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url();">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="../assets/media/logos/logo-5.png">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Whatever Company</h3>
                        </div>
                        <form class="kt-form" method="POST" action="">
                            <div class="input-group">
                                <input class="form-control" type="text"  placeholder="E-posta" name="email"  autocomplete="off" required/>
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="password"  placeholder="Sifre" name="password" required/>
                            </div>
                            <div class="kt-login__actions">
                                <button type="submit" name="submit" class="btn btn-brand btn-elevate kt-login__btn-primary" onclick="">Giriş</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Page -->
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin:: Global Mandatory Vendors -->
<script src="../assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="../assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="../assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="../assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="../assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="../assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="../assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="../assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->
<script src="../assets/app/custom/login/login-general.js" type="text/javascript"></script>

<!--end::Page Scripts -->

<!--begin::Global App Bundle(used by all pages) -->
<script src="../assets/app/bundle/app.bundle.js" type="text/javascript"></script>

<!--end::Global App Bundle -->

<script>
    /*document.getElementById("kt_login_signin_submit_merve").onclick = function() {myFunction()};

    function myFunction() {
        document.getElementById("kt_login_signin_submit_merve").href = "";
    }*/

    var handleSignInFormSubmit = function() {
        $('#kt_login_signin_submit_merve').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: '',
                success: function(response, status, xhr, $form) {
                    // similate 2s delay
                    setTimeout(function() {
                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        showErrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');
                    }, 2000);
                }
            });
        });
    }
    // Class Initialization
    jQuery(document).ready(function() {
        handleSignInFormSubmit.init();
    });


    // Initialize KTApp class on document ready
    $(document).ready(function() {
        KTApp.init(KTAppOptions);
    });
    "use strict";

</script>
</body>
<!-- end::Body -->
</html>

