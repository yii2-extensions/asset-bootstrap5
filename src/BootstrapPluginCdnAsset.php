<?php

declare(strict_types=1);

namespace Yii2\Asset;

use yii\web\AssetBundle;

/**
 * Twitter Bootstrap 5 CDN JavaScript bundle.
 */
final class BootstrapPluginCdnAsset extends AssetBundle
{
    /**
     * @inheritDoc
     *
     * @phpstan-var array<array-key, mixed>
     */
    public $js = [
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
    ];

    /**
     * @inheritDoc
     *
     * @phpstan-var array<array-key, mixed>
     */
    public $jsOptions = [
        'crossorigin' => 'anonymous',
        'integrity' => 'sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL',
    ];

    /**
     * @inheritDoc
     *
     * @phpstan-var array<array-key, mixed>
     */
    public $depends = [
        BootstrapCdnAsset::class,
    ];
}
