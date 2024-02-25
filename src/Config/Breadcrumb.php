<?php

declare(strict_types=1);

namespace IctSolutions\CodeIgniterBreadcrumbs\Config;

use CodeIgniter\Config\BaseConfig;

class Breadcrumb extends BaseConfig
{
    /**
     * Indicates whether the breadcrumbs will be translatable or not.
     *
     * @var bool Specifies if the breadcrumbs are translatable. Default is true.
     */
    public bool $isTranslatable = true;

    /**
     * A boolean variable that determines whether the home page is included in the breadcrumbs.
     *
     * @var bool Specifies if the home page is included in the breadcrumbs. The default value is true.
     */
    public bool $includeHome = false;

    /**
     * Set the desired style for the navigation. Default value is 'tabler'.
     * Allowed values: 'tabler', 'bootstrap5'.
     *
     * @var string The style to be used for rendering the navigation.
     */
    public string $style = 'tabler';

    /**
     * A boolean variable that determines whether the special words in the breadcrumbs are replacable or not.
     *
     * @var bool Specifies if the special words in the breadcrumbs are replacable. The default value is true.
     */
    public bool $isSpecialWordsReplacable = true;

    /**
     * An array of special words that are replacable in the breadcrumbs.
     *
     * @var array The special words that are replacable in the breadcrumbs.
     */
    public array $specialWords = ['new', 'edit', 'delete'];
}
