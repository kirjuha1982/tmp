<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'libs/global/css/bootstrap.min.css',
        'libs/global/css/bootstrap-extend.min.css',
        'libs/base/assets/css/site.min.css',
        'libs/global/vendor/animsition/animsition.css',
        'libs/global/vendor/asscrollable/asScrollable.css',
        'libs/global/vendor/switchery/switchery.css',
        'libs/global/vendor/intro-js/introjs.css',
        'libs/global/vendor/slidepanel/slidePanel.css',
        'libs/global/vendor/flag-icon-css/flag-icon.css',
        'libs/global/vendor/waves/waves.css',
        'libs/global/vendor/chartist/chartist.css',
        'libs/global/vendor/jvectormap/jquery-jvectormap.css',
        'libs/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css',
        'libs/base/assets/examples/css/dashboard/v1.css',
        'libs/global/fonts/material-design/material-design.min.css',
        'libs/global/fonts/brand-icons/brand-icons.min.css',
        'libs/tokenfield/css/bootstrap-tokenfield.min.css',
        'libs/global/vendor/dropify/dropify.css',
        'libs/global/vendor/html5sortable/sortable.css',
        'libs/global/vendor/nestable/nestable.css',
    ];

    public $js = [
        'libs/global/vendor/babel-external-helpers/babel-external-helpers.js',
        'libs/global/vendor/tether/tether.js',

        'libs/global/vendor/animsition/animsition.js',
        'libs/global/vendor/mousewheel/jquery.mousewheel.js',
        'libs/global/vendor/asscrollbar/jquery-asScrollbar.js',
        'libs/global/vendor/asscrollable/jquery-asScrollable.js',
        'libs/global/vendor/ashoverscroll/jquery-asHoverScroll.js',
        'libs/global/vendor/waves/waves.js',
        'libs/global/vendor/switchery/switchery.min.js',
        'libs/global/vendor/intro-js/intro.js',
        'libs/global/vendor/screenfull/screenfull.js',
        'libs/global/vendor/slidepanel/jquery-slidePanel.js',
        'libs/global/vendor/chartist/chartist.min.js',
        'libs/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js',
        'libs/global/vendor/jvectormap/jquery-jvectormap.min.js',
        'libs/global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js',
        'libs/global/vendor/matchheight/jquery.matchHeight-min.js',
        'libs/global/vendor/peity/jquery.peity.min.js',
        'libs/global/vendor/html5sortable/html.sortable.js',
        'libs/global/vendor/nestable/jquery.nestable.js',
        'libs/global/js/State.js',
        'libs/global/js/Component.js',
        'libs/global/js/Plugin.js',
        'libs/global/js/Base.js',
        'libs/global/js/Config.js',
        'libs/base/assets/js/Section/Menubar.js',
        'libs/base/assets/js/Section/GridMenu.js',
        'libs/base/assets/js/Section/Sidebar.js',
        'libs/base/assets/js/Section/PageAside.js',
        'libs/base/assets/js/Plugin/menu.js',
        'libs/global/js/config/colors.js',
        'libs/base/assets/js/config/tour.js',

        'libs/global/js/Plugin/asscrollable.js',
        'libs/global/js/Plugin/slidepanel.js',
        'libs/global/js/Plugin/switchery.js',
        'libs/global/js/Plugin/matchheight.js',
        'libs/global/js/Plugin/jvectormap.js',
        'libs/global/js/Plugin/peity.js',
        'libs/global/js/Plugin/select2.js',
        'libs/tokenfield/bootstrap-tokenfield.js',
        'libs/global/js/Plugin/bootstrap-tagsinput.js',
        'libs/global/js/Plugin/bootstrap-select.js',
        'libs/global/js/Plugin/icheck.js',
        'libs/global/js/Plugin/asrange.js',
        'libs/global/js/Plugin/ionrangeslider.js',
        'libs/global/js/Plugin/asspinner.js',
        'libs/global/js/Plugin/clockpicker.js',
        'libs/global/js/Plugin/ascolorpicker.js',
        'libs/global/js/Plugin/bootstrap-maxlength.js',
        'libs/global/js/Plugin/jquery-knob.js',
        'libs/global/js/Plugin/bootstrap-touchspin.js',
        'libs/global/js/Plugin/card.js',
        'libs/global/js/Plugin/jquery-labelauty.js',
        'libs/global/js/Plugin/bootstrap-datepicker.js',
        'libs/global/js/Plugin/jt-timepicker.js',
        'libs/global/js/Plugin/datepair.js',
        'libs/global/js/Plugin/jquery-strength.js',
        'libs/global/js/Plugin/multi-select.js',
        'libs/global/js/Plugin/jquery-placeholder.js',
        'libs/global/js/Plugin/html5sortable.js',
        'libs/global/js/Plugin/nestable.js',

        //'libs/base/assets/examples/js/forms/advanced.js',
        'libs/base/assets/examples/js/dashboard/v1.js',
        'libs/global/vendor/dropify/dropify.min.js',
        'libs/base/assets/js/Site.js',

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'common\assets\Html5shiv',
    ];
}
