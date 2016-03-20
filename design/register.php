<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Visconti project</title>

    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet'>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <style>
        .colorgraph {
            height: 5px;
            border-top: 0;
            background: #c4e17f;
            border-radius: 5px;
            background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        }
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
    <div id="content">
        <header id="primary">
            <div class="container">
                <nav class="row">
                    <div class="col-sm-4">
                        <a href="index.php"><img src="images/logo.png">
                        </a>
                    </div>


                    <div id="header-actions" class="col-sm-4">
                        <a class="btn purple" href="#">Create New Account</a>
                    </div>
                </nav>
            </div>
        </header>

        <main id="new" class="container">
            <div class="row">
                <h1>Experts portal</h1>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form">
                        <h2>Please Sign Up <small>It's free and always will be.</small></h2>
                        <hr class="colorgraph">
                        <div class="form-group">
                            <select name="gender" class="form-control">
                                <option>Mr.</option>
                                <option>Mrs.</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="first_name" class="form-control input-lg" placeholder="Given name" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="last_name" class="form-control input-lg" placeholder="Family name" tabindex="2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            Birth year
                            <select name="birth_year" class="form-control">
								<?php
									$yearRange = 100;
									 
									$ageLimit = 18;
									 
									$thisYear = date('Y');
									$startYear = ($thisYear - $yearRange);
									$thisYear -= 18;
									
									foreach (range($thisYear, $startYear) as $year) {
										$selected = "";
										if($year == $thisYear) { $selected = " selected"; }
										print '<option' . $selected . '>' . $year . '</option>';
									}
								?>
							</select>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-sm-3 col-md-3">
                                <span class="button-checkbox">
								    <input type="checkbox"> I Agree
									<input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
								</span>
                            </div>
                            <div class="col-xs-8 col-sm-9 col-md-9">
                                By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                            </div>
                        </div>

                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7">
                            </div>
                            <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a>
                            </div>
                        </div>
                    </form>
                    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </main>
        <footer>
            <div class="container">
                <small class="row">&copy; 2016 Fomrad</small>
            </div>
        </footer>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>