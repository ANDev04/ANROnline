<!DOCTYPE HTML>
<html>
	<head>
		<title>ANROnline | Login</title>
        <script src="<?php echo base_url("assets/js/jquery.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/materialize.min.js") ?>"></script>
        <link href="<?php echo base_url("assets/css/materialize.min.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/style.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/materialize-icon.css") ?>" rel=stylesheet>
        <style>
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(<?php echo base_url("assets/images/Preloader_7.gif") ?>) center no-repeat white;
            }
            img{
                filter: blur(8px);
            }
        </style>
	</head>
	<body>
        <main>
            <div class="navbar-fixed">
            <nav class=" transparent z-depth-0" style="position:fixed;top:0;">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo"><i class="material-icons" style="font-size : 2.5rem; margin-right:3px; margin-left:5px;">book</i>ANROnline</a>
                </div>
            </nav>
            </div>
            <div class="slider fullscreen" style="z-index: -9999;">
                <ul class="slides">
                    <li>
                        <img src="<?php echo base_url() ?>assets/images/1.jpg">
                    </li>
                    <li>
                        <img src="<?php echo base_url() ?>assets/images/2.jpg">
                    </li>
                    <li>
                        <img src="<?php echo base_url() ?>assets/images/3.jpg">
                    </li>
                </ul>
            </div>
            <div class="container z-depth-2" style="width:450px; margin-top:25px;">
                <div class="section #e53935 red darken-1">
                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="white-text text-darken-1">Login</h4>
                        </div>
                    </div>
                    <div class="#f5f5f5 grey lighten-4">
                        <div class="row" style="padding:20px">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="icon_prefix" type="text" name="username" class="validate">
                                        <label for="icon_prefix">Username / E-mail</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <a href="#">Lupa password?</a>
                                    </div>
                                    <div class="col s6 right-align"><button class="btn" type="submit" name="type" value="insert"><i class="material-icons left">input</i>Login</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed-action-btn hide-on-med-and-down">
                <a class="btn-floating btn-large blue" href="#modal1">
                    <i class="large material-icons">live_help</i>
                </a>
            </div>
            <div id="modal1" class="modal bottom-sheet">
                <div class="modal-content" style="padding: 0;">
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <div class="container center" style="padding-top: 10px;">
                                    © 2017 ANDev04
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script>
        $(document).ready(function() {
            $('.slider').slider();
            $('.modal').modal();
        });
    </script>
</html>
