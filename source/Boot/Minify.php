<?php
if(strpos(url(), "localhost")){

    $cssMin = new MatthiasMullie\Minify\CSS();
    $cssMin->add(__DIR__ ."/../../shared/styles/styles.css");
    $cssMin->add(__DIR__ ."/../../shared/styles/boot.css");

    /* CSS THEME */
    $cssDir = scandir(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/css");
    foreach ($cssDir as $css){
        $cssFile = __DIR__ ."/../../themes/" . CONF_VIEW_THEME . "/assets/css/{$css}";
        if(is_file($cssFile) && pathinfo($cssFile)['extension'] == "css"){
            $cssMin->add($cssFile);
        }

        /* MINIFY CSS */
        $cssMin->minify(__DIR__ . "/../../themes/".CONF_VIEW_THEME."/assets/style.css");

    }

    /**
     * JS THEME
     */

    $jsMin = new MatthiasMullie\Minify\JS();
    $jsMin->add(__DIR__ ."/../../shared/scripts/jquery.min.js");
    $jsMin->add(__DIR__ ."/../../shared/scripts/jquery.form.js");
    $jsMin->add(__DIR__ ."/../../shared/scripts/jquery-ui.js");


    $jsDir = scandir(__DIR__ ."/../../themes/".CONF_VIEW_THEME."/assets/js");
    foreach ($jsDir as $js){
        $jsFile = __DIR__."/../../themes/".CONF_VIEW_THEME."/assets/js/{$js}";
        if(is_file($jsFile) && pathinfo($jsFile)['extension'] == "js"){
            $jsMin->add($jsFile);
        }


        $jsMin->minify(__DIR__."/../../themes/".CONF_VIEW_THEME."/assets/scripts.js");
    }

}
