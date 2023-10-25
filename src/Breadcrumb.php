<?php

declare(strict_types=1);

namespace IctSolutions\CodeIgniterBreadcrumbs;

use CodeIgniter\HTTP\URI;
use IctSolutions\CodeIgniterBreadcrumbs\Config\Breadcrumb as BreadcrumbConfig;
use RuntimeException;

class Breadcrumb
{
    protected BreadcrumbConfig $config;

    /**
     * An empty array to hold breadcrumb links for this instance of the Breadcrumbs class.
     */
    protected array $links = [];

    /**
     * Constructor method that initializes a new instance of Breadcrumbs and generates breadcrumb links based on the current URL segments.
     *
     * @return void
     */
    public function __construct()
    {
        $this->config = config('Breadcrumb');

        $uri = ''; // Initialize an empty string to build up the URI by appending each segment

        /** @var URI $url */
        $url = current_url(true);

        $segments = $url->getSegments(); // Get the current URL segments using CodeIgniter's Url helper

        foreach ($segments as $key => $segment) {
            $uri .= '/' . $segment; // Append each segment to the URI with a leading slash

            // Generate a link for this segment and add it to the list of breadcrumbs
            $this->links[] = [
                'text'   => is_numeric($segment) ? $segment : ($this->config->isTranslatable ? lang('Breadcrumb.' . $segment) : $segment), // Use either the segment value or a localized version of it as the text for the link if enabled
                'href'   => base_url($uri), // Generate the link's href using the URI built up so far
                'active' => false, // Assume the link is not active by default
            ];

            if ($key === count($segments) - 1) {
                // Mark the last link as active
                $this->links[$key]['active'] = true;
            }
        }
    }

    /**
     * Replaces any numeric text parameters in the links with values from an array of new parameters.
     *
     * @param array $newParams An array of new parameter values to replace the existing ones with
     */
    public function replaceParams(array $newParams): void
    {
        // Loop through each link in the $this->links array by reference to modify the original array
        foreach ($this->links as &$link) {
            // Check if this link's text is numeric and there are still new parameters to replace it with
            if (is_numeric($link['text']) && ! empty($newParams)) {
                // Replace the numeric text with the next value from the $newParams array
                $link['text'] = array_shift($newParams);
            }
        }
    }

    /**
     * Renders the breadcrumb object as an accessible html breadcrumb nav.
     *
     * @param string $class     The CSS class to apply to the breadcrumb navigation
     * @param string $listItems The HTML markup for the breadcrumb list items
     *
     * @return string HTML representation of breadcrumb navigation.
     */
    public function render(string $class = '', string $listItems = ''): string
    {
        if (setting('Breadcrumb.includeHome')) {
            $homeLink['text']   = lang('Menu.home');
            $homeLink['href']   = base_url();
            $homeLink['active'] = current_url() === base_url();
            $listItems .= $this->createListItem($homeLink);
        }

        // Loop through each link in the array of links and create a list item for it
        foreach ($this->links as $link) {
            $listItems .= $this->createListItem($link);
        }

        return match ($this->config->style) {
            'tabler'     => '<ol class="breadcrumb' . ($class !== '' ? ' ' . $class : '') . '" aria-label="breadcrumbs">' . $listItems . '</ol>',
            'bootstrap5' => '<nav aria-label="breadcrumb"><ol class="breadcrumb' . ($class !== '' ? ' ' . $class : '') . '">' . $listItems . '</ol></nav>',
            default      => throw new RuntimeException("Breadcrumb: Invalid style {$this->config->style} specified."),
        };
    }

    /**
     * Creates a breadcrumb list item for the given link array
     *
     * @param array $link An associative array containing 'text', 'href', and 'active' keys for this list item
     *
     * @return string The HTML code for the generated breadcrumb list item
     */
    private function createListItem(array $link): string
    {
        $class = $link['active'] ? 'breadcrumb-item active' : 'breadcrumb-item'; // Set the class for the list item based on whether it is active or not
        $text  = $link['text']; // Retrieve the text for the list item
        $href  = $link['href']; // Retrieve the href for the list item

        // If the link is active, return a plain list item with the 'active' class and aria-current="page"
        if ($link['active']) {
            return "<li class=\"{$class}\" aria-current=\"page\">{$text}</li>";
        }

        // Otherwise, return a list item containing an anchor tag with the appropriate href and text
        return "<li class=\"{$class}\">" . anchor($href, $text) . '</li>';
    }
}
