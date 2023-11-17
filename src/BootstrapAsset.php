<?php

declare(strict_types=1);

namespace Yii2\Asset;

use yii\web\AssetBundle;

/**
 * Twitter Bootstrap 5 CSS bundle.
 */
final class BootstrapAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/bootstrap/dist/css';

    public function init(): void
    {
        parent::init();

        $assetBootstrap = YII_ENV === 'prod'
            ? ['bootstrap.min.css', 'bootstrap.min.css.map'] : ['bootstrap.css', 'bootstrap.css.map'];

        $this->css = $assetBootstrap;
        $this->publishOptions['only'] = $assetBootstrap;
    }
}
