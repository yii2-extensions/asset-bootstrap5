<?php

declare(strict_types=1);

namespace Yii2\Asset;

use yii\web\AssetBundle;

/**
 * Twitter Bootstrap 5 JavaScript bundle.
 */
class BootstrapPluginAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/bootstrap/dist/js';

    /**
     * @inheritDoc
     */
    public $depends = [
        BootstrapAsset::class,
    ];

    public function init(): void
    {
        parent::init();

        $assetBootstrapPlugin = YII_ENV === 'prod' ? 'bootstrap.bundle.min.js' : 'bootstrap.bundle.js';

        $this->js[] = $assetBootstrapPlugin;
        $this->publishOptions['only'] = [$assetBootstrapPlugin];
    }
}
