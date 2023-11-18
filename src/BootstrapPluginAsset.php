<?php

declare(strict_types=1);

namespace Yii2\Asset;

use yii\web\AssetBundle;

/**
 * Twitter Bootstrap 5 JavaScript bundle.
 */
final class BootstrapPluginAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/bootstrap/dist/js';

    /**
     * @inheritDoc
     *
     * @phpstan-var array<array-key, mixed>
     */
    public $depends = [
        BootstrapAsset::class,
    ];

    public function init(): void
    {
        parent::init();

        $assetBootstrapPlugin = YII_ENV === 'prod' ? ['bootstrap.bundle.min.js'] : ['bootstrap.bundle.js'];
        $assetBootstrapPluginMap = YII_ENV === 'prod' ? ['bootstrap.bundle.min.js.map'] : ['bootstrap.bundle.js.map'];

        $this->js = $assetBootstrapPlugin;
        $this->publishOptions['only'] = array_merge($assetBootstrapPlugin, $assetBootstrapPluginMap);
    }
}
