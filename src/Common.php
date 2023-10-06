<?php

if (! function_exists('render_breadcrumb')) {
    /**
     * Renders the breadcrumb navigation through the Breadcrumb service
     *
     * @param string $class     The CSS class to use for the breadcrumb container element (default: 'breadcrumb-arrows')
     * @param string $listItems The HTML markup for the breadcrumb list items
     *
     * @return string The HTML markup for the breadcrumb navigation
     */
    function render_breadcrumb(string $class = '', string $listItems = ''): string
    {
        $breadcrumbService = service('breadcrumb');

        return $breadcrumbService ? $breadcrumbService->render($class, $listItems) : '';
    }
}

if (! function_exists('replace_breadcrumb_params')) {
    /**
     * Replaces all numeric text in breadcrumb's $link property with new params at same position through the Breadcrumb service
     *
     * @param array $newParams An array of new parameters to replace the original ones with
     */
    function replace_breadcrumb_params(array $newParams): void
    {
        $breadcrumbService = service('breadcrumb');

        if (! $breadcrumbService) {
            throw new Exception('Breadcrumb service is null');
        }

        // Get the Breadcrumb service instance and replace its parameters with the new ones
        $breadcrumbService->replaceParams($newParams);
    }
}
