<?php

declare(strict_types=1);

namespace Config;

use IctSolutions\CodeIgniterBreadcrumbs\Config\Breadcrumb as BreadcrumbConfig;

class Breadcrumb extends BreadcrumbConfig
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
