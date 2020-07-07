<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Café Food - gerencie seus pedidos de forma simples :)</title>

    <link rel="stylesheet" type="text/css" href="<?= themeapp("/assets/css/bootstrap/bootstrap.min.css"); ?>"/>

    <link rel="stylesheet" type="text/css" href="<?= themeapp("/assets/css/libs/font-awesome.css"); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= themeapp("/assets/css/libs/nanoscroller.css"); ?>"/>

    <link rel="stylesheet" type="text/css" href="<?= themeapp("/assets/css/compiled/theme_styles.css"); ?>"/>

    <link rel="stylesheet" href="<?= themeapp("/assets/css/libs/daterangepicker.css"); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?= themeapp("/assets/css/libs/jquery-jvectormap-1.2.2.css"); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?= themeapp("/assets/css/libs/weather-icons.css"); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?= themeapp("/assets/css/libs/morris.css"); ?>" type="text/css"/>
    <link type="image/x-icon" href="<?= themeapp("/assets/css/libs/morris.css"); ?>favicon.png" rel="shortcut icon"/>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
		<script src="<?= themeapp("/assets/js/html5shiv.js"); ?>"></script>
		<script src="<?= themeapp("/assets/js/respond.min.js"); ?>"></script>
	<![endif]-->


</head>
<body>
<div id="theme-wrapper">
    <?php $v->insert("views/navbar"); ?>
    <div id="page-wrapper" class="container">
        <div class="row">
            <?php $v->insert("views/sidebar"); ?>
            <div id="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="content-header" class="clearfix">
                                    <div class="pull-left">
                                        <ol class="breadcrumb">
                                            <li><a href="<?= url("/app") ;?>">App</a></li>
                                            <li class="active"><span><?= current_url() ;?></span></li>
                                        </ol>
                                        <h1><?= strtoupper(current_url()) ;?></h1>
                                    </div>
                                    <div class="pull-right hidden-xs">
                                        <div class="xs-graph pull-left">
                                            <div class="graph-label">
                                                <b><i class="fa fa-shopping-cart"></i> 838</b> Orders
                                            </div>
                                            <div class="graph-content spark-orders"></div>
                                        </div>
                                        <div class="xs-graph pull-left mrg-l-lg mrg-r-sm">
                                            <div class="graph-label">
                                                <b>&dollar;12.338</b> Revenues
                                            </div>
                                            <div class="graph-content spark-revenues"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= flash(); ?>
                <?= $v->section("content"); ?>

                <footer id="footer-bar" class="row">
                    <p id="footer-copyright" class="col-xs-12">
                        Desenvolvido por Café Sistemas.
                    </p>
                </footer>
            </div>
        </div>
    </div>
</div>
<script src="<?= themeapp("/assets/js/jquery.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/bootstrap.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/jquery.nanoscroller.min.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/demo.js"); ?>"></script>

<script src="<?= themeapp("/assets/js/jquery.scrollTo.min.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/jquery.slimscroll.min.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/moment.min.js"); ?>"></script>
<script src="<?= theme("/assets/js/jquery-jvectormap-1.2.2.min.js", CONF_VIEW_APP) ;?>"></script>
<script src="<?= theme("/assets/js/jquery-jvectormap-world-merc-en.js", CONF_VIEW_APP) ;?>"></script>
<script src="<?= themeapp("/assets/js/gdp-data.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/flot/jquery.flot.min.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/flot/jquery.flot.resize.min.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/flot/jquery.flot.time.min.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/flot/jquery.flot.threshold.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/flot/jquery.flot.axislabels.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/jquery.sparkline.min.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/skycons.js"); ?>"></script>


<script src="<?= themeapp("/assets/js/raphael-min.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/morris.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/scripts.js"); ?>"></script>
<script src="<?= themeapp("/assets/js/pace.min.js"); ?>"></script>
<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
</body>
</html>