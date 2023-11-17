<?php

declare(strict_types=1);

namespace Yii2\Asset;

use yii\web\AssetBundle;

/**
 * Popper CDN JavaScript bundle.
 */
final class PopperCdnAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $js = [
        'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js'
    ];

    /**
     * @inheritDoc
     */
    public $jsOptions = [
        'crossorigin' => 'anonymous',
        'integrity' => 'sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r',
    ];
}
