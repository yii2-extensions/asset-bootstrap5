<?php

declare(strict_types=1);

namespace Yii2\Asset;

use yii\web\AssetBundle;

/**
 * Popper JavaScript bundle.
 */
final class PopperAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/popperjs--core/dist/umd';

    public function init(): void
    {
        parent::init();

        $assetPopper = YII_ENV === 'prod'
            ? ['popper.min.js', 'popper.min.js.map']
            : ['popper.js', 'popper.js.map'];

        $this->css = $assetPopper;
        $this->publishOptions['only'] = $assetPopper;
    }
}
