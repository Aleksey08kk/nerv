<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class StreamAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/lobby.css',
        'css/main.css',
        'css/room.css'
    ];
    public $js = [
        'js/AgoraRTC_N-4.11.0.js',
        'js/agora-rtm-sdk-1.4.4.js',
        'js/room.js',
        'js/room_rtm.js',
        'js/room_rtc.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
