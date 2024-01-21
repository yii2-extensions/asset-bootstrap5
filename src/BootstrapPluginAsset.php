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

    public function __construct()
    {
        $environment = defined('YII_ENV') ? YII_ENV : 'prod';
        $jsFiles = $environment === 'prod' ? 'bootstrap.bundle.min.js' : 'bootstrap.bundle.js';

        $this->js = [$jsFiles];
        $this->publishOptions['only'] = [$jsFiles, "{$jsFiles}.map"];
    }
}
