<?php

declare(strict_types=1);

namespace IctSolutions\CodeIgniterBreadcrumbs\Config;

use CodeIgniter\Config\BaseService;
use IctSolutions\CodeIgniterBreadcrumbs\Breadcrumb;

class Services extends BaseService
{
    /**
     * Get an instance of the Breadcrumb service
     *
     * @param bool $getShared Whether to get a shared instance of the service (default: true)
     *
     * @return Breadcrumb An instance of the Breadcrumb service
     */
    public static function breadcrumb(bool $getShared = true): Breadcrumb
    {
        if ($getShared) {
            /** @var Breadcrumb $breadcrumb */
            $breadcrumb = static::getSharedInstance('breadcrumb');

            return $breadcrumb;
        }

        return new Breadcrumb();
    }
}
