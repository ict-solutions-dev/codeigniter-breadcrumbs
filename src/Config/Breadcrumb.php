<?php

declare(strict_types=1);

namespace IctSolutions\CodeIgniterBreadcrumbs\Config;

use CodeIgniter\Config\BaseConfig;

class Breadcrumb extends BaseConfig
{
    /**
     * Indicates whether the breadcrumbs will be translatable or not.
     *
     * @var bool Specifies if the breadcrumbs are translatable. Default is false.
     */
    public bool $isTranslatable = false;

    /**
     * Set the desired style for the navigation. Default value is 'tabler'.
     * Allowed values: 'tabler', 'bootstrap5'.
     *
     * @var string The style to be used for rendering the navigation.
     */
    public string $style = 'tabler';
}
