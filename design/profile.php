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
        .progress {
            height: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #f5f5f5;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .progress {
            background-image: -webkit-gradient(linear, left 0, left 100%, from(#ebebeb), to(#f5f5f5));
            background-image: -webkit-linear-gradient(top, #ebebeb 0, #f5f5f5 100%);
            background-image: -moz-linear-gradient(top, #ebebeb 0, #f5f5f5 100%);
            background-image: linear-gradient(to bottom, #ebebeb 0, #f5f5f5 100%);
            background-repeat: repeat-x;
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#ffebebeb', endColorstr='#fff5f5f5', GradientType=0);
        }
        .progress {
            height: 20px;
            background-color: #ebeef1;
            background-image: none;
            box-shadow: none;
        }
        .progress-bar {
            float: left;
            width: 0;
            height: 100%;
            font-size: 12px;
            line-height: 20px;
            color: #fff;
            text-align: center;
            background-color: #428bca;
            -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
            -webkit-transition: width .6s ease;
            transition: width .6s ease;
        }
        .progress-bar {
            background-image: -webkit-gradient(linear, left 0, left 100%, from(#428bca), to(#3071a9));
            background-image: -webkit-linear-gradient(top, #428bca 0, #3071a9 100%);
            background-image: -moz-linear-gradient(top, #428bca 0, #3071a9 100%);
            background-image: linear-gradient(to bottom, #428bca 0, #3071a9 100%);
            background-repeat: repeat-x;
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#ff428bca', endColorstr='#ff3071a9', GradientType=0);
        }
        .progress-bar {
            box-shadow: none;
            border-radius: 3px;
            background-color: #0090D9;
            background-image: none;
            -webkit-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
            -moz-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
            -ms-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
            -o-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
            transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
            -webkit-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
            -moz-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
            -ms-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
            -o-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
            transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
        }
        .progress-bar-success {
            background-image: -webkit-gradient(linear, left 0, left 100%, from(#5cb85c), to(#449d44));
            background-image: -webkit-linear-gradient(top, #5cb85c 0, #449d44 100%);
            background-image: -moz-linear-gradient(top, #5cb85c 0, #449d44 100%);
            background-image: linear-gradient(to bottom, #5cb85c 0, #449d44 100%);
            background-repeat: repeat-x;
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#ff5cb85c', endColorstr='#ff449d44', GradientType=0);
        }
        .progress-bar-success {
            background-color: #0AA699;
            background-image: none;
        }
        .progress-bar-info {
            background-image: -webkit-gradient(linear, left 0, left 100%, from(#5bc0de), to(#31b0d5));
            background-image: -webkit-linear-gradient(top, #5bc0de 0, #31b0d5 100%);
            background-image: -moz-linear-gradient(top, #5bc0de 0, #31b0d5 100%);
            background-image: linear-gradient(to bottom, #5bc0de 0, #31b0d5 100%);
            background-repeat: repeat-x;
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de', endColorstr='#ff31b0d5', GradientType=0);
        }
        .progress-bar-info {
            background-color: #0090D9;
            background-image: none;
        }
        .progress-bar-warning {
            background-image: -webkit-gradient(linear, left 0, left 100%, from(#f0ad4e), to(#ec971f));
            background-image: -webkit-linear-gradient(top, #f0ad4e 0, #ec971f 100%);
            background-image: -moz-linear-gradient(top, #f0ad4e 0, #ec971f 100%);
            background-image: linear-gradient(to bottom, #f0ad4e 0, #ec971f 100%);
            background-repeat: repeat-x;
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#fff0ad4e', endColorstr='#ffec971f', GradientType=0);
        }
        .progress-bar-warning {
            background-color: #FDD01C;
            background-image: none;
        }
        .progress-bar-danger {
            background-image: -webkit-gradient(linear, left 0, left 100%, from(#d9534f), to(#c9302c));
            background-image: -webkit-linear-gradient(top, #d9534f 0, #c9302c 100%);
            background-image: -moz-linear-gradient(top, #d9534f 0, #c9302c 100%);
            background-image: linear-gradient(to bottom, #d9534f 0, #c9302c 100%);
            background-repeat: repeat-x;
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#ffd9534f', endColorstr='#ffc9302c', GradientType=0);
        }
        .progress-bar-danger {
            background-color: #F35958;
            background-image: none;
        }
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
    <div id="content">
        <header id="primary">
            <div class="container">
                <nav class="row">
                    <div class="col-sm-5">
                        <a href="index.php"><img src="images/logo.png">
                        </a>
                        <ul class="nav nav-pills pull-right">
                            <li><a href="#">Home</a>
                            </li>
                            <li><a href="#">Canvas</a>
                            </li>
                            <li class="active"><a href="#">Profile</a>
                            </li>
                            <li><a href="#">Logout</a>
                            </li>
                        </ul>
                    </div>

                    <div id="header-actions" class="col-sm-4">
                        <button class="btn purple">Welcome member</button>
                    </div>
                </nav>
            </div>
        </header>
        <div class="alert no-margin no-bg-image" style="display:none" data-view="global_message">
            <div class="container"></div>
        </div>

        <div class="status-bar">
            <section class="status-bar">
                <div class="container">
                    <div class="row">
                        <ul id="tabs" class="nav nav-pills" data-tabs="tabs">
                            <li class="active"><a href="#1" data-toggle="tab">Personal Info</a>
                            </li>
                            <li><a href="#2" data-toggle="tab">Contact Info</a>
                            </li>
                            <li><a href="#3" data-toggle="tab">Education</a>
                            </li>
                            <li><a href="#4" data-toggle="tab">Experience</a>
                            </li>
                            <li><a href="#5" data-toggle="tab">Specialization</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <main id="new" class="container">
            <div class="row">
                <div id="profile-tab-content" class="tab-content">
                    <div class="tab-pane active" id="1">
                        <div class="row" style="margin-top:20px">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2">
                                <form role="form">
                                    Title
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
                                        <div class="col-xs-12 col-md-6">
                                            <input type="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="7">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <ul id="sidebar" class="col-sm-12 col-md-3">
                                <div class="progress">
                                    <div data-percentage="0%" style="width: 20%;" class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>bla bla</p>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane" id="2">
                        <div class="row" style="margin-top:20px">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2">
                                <form role="form">
                                    Mobile number
                                    <div class="form-group">
                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control input-lg" placeholder="Mobile number" tabindex="3">
                                    </div>
                                    Phone number
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" class="form-control input-lg" placeholder="Phone number" tabindex="3">
                                    </div>
                                    Fax
                                    <div class="form-group">
                                        <input type="text" name="fax" id="fax" class="form-control input-lg" placeholder="Fax" tabindex="3">
                                    </div>
                                    Country of residence
                                    <div class="form-group">
                                        <select name="gender" class="form-control">
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <input type="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="7">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <ul id="sidebar" class="col-sm-12 col-md-3">
                                <div class="progress">
                                    <div data-percentage="0%" style="width: 40%;" class="progress-bar progress-bar-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>bla bla</p>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane" id="3">
                        <div class="row" style="margin-top:20px">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2">
                                <form role="form">
                                    ...
                                </form>
                            </div>
                            <ul id="sidebar" class="col-sm-12 col-md-3">
                                <div class="progress">
                                    <div data-percentage="0%" style="width: 60%;" class="progress-bar progress-bar-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>bla bla</p>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane" id="4">
                        <div class="row" style="margin-top:20px">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2">
                                <form role="form">
                                    Job title
                                    <div class="form-group">
                                        <select name="gender" class="form-control">
                                            <option>Mr.</option>
                                            <option>Mrs.</option>
                                        </select>
                                    </div>
                                    Job description
                                    <div class="form-group">
                                        <textarea class="form-control title-input" name="description" autofocus="" required=""></textarea>
                                    </div>
                                    Institution name
                                    <div class="form-group">
                                        <input type="text" name="fax" id="fax" class="form-control input-lg" tabindex="3">
                                    </div>
                                </form>
                            </div>
                            <ul id="sidebar" class="col-sm-12 col-md-3">
                                <div class="progress">
                                    <div data-percentage="0%" style="width: 80%;" class="progress-bar progress-bar-info" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>bla bla</p>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane" id="5">
                        <div class="row" style="margin-top:20px">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <b>Sectors</b>
                                            </br>
                                            bla bla bla
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <b>Sub-sectors</b>
                                            </br>
                                            bla bla bla
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <b>Specializations</b>
                                            </br>
                                            bla bla bla
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <b>Interests</b>
                                            </br>
                                            bla bla bla
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-xs-6 col-md-12">
                                        <span class="menu pull-right">
											<button class="btn btn-danger">Remove selected</button>
										</span>
                                    </div>
                                    Selection summary
                                    <div class="jumbotron">
                                        bla bla bla
                                    </div>
                                </form>
                            </div>
                            <ul id="sidebar" class="col-sm-12 col-md-3">
                                <div class="progress">
                                    <div data-percentage="0%" style="width: 100%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>bla bla</p>
                            </ul>
                        </div>
                    </div>
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