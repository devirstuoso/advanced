<?php 

namespace common\modules\formpanel\assets;

use yii\web\AssetBundle;

class FormpanelAsset extends AssetBundle
{
	public $sourcePath = '@formpanel/web'; //alias to asset folder in file system
	public $baseUrl = '@formpanel-url';

	public $css = [
        'css/main.css',
        'https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css', //for adminlte
        // 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css',
        'fontawesome/css/main.css',

    ];
    public $js = [
        'js/file.js',
        'https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js', //for adminlte
        'fontawesome/js/all.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

?>