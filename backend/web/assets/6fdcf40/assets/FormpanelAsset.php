<?php 

namespace common\modules\formpanel\assets;

use yii\web\AssetBundle;

class FormpanelAsset extends AssetBundle
{
	public $sourcePath = '@formpanel/'; //alias to asset folder in file system
	// public $baseUrl = '@formpanel-web';

	public $css = [
        'css/main.css',

    ];
    public $js = [
        'js/file.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

?>