<?php

namespace Tests;

use IctSolutions\CodeIgniterBreadcrumbs\Breadcrumb;
use Tests\Support\TestCase;

/**
 * @internal
 */
final class CommonTest extends TestCase
{
    public function testReturnsServiceByDefault()
    {
        $this->assertInstanceOf(Breadcrumb::class, service('breadcrumb'));
    }

    public function testRenderBreadcrumb()
    {
        $this->assertSame('<ol class="breadcrumb" aria-label="breadcrumbs"></ol>', render_breadcrumb());
    }

    public function testRenderBreadcrumbWithListItems()
    {
        $listItems = '<li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active" aria-current="page">Library</li>';

        $this->assertSame('<ol class="breadcrumb" aria-label="breadcrumbs">' . $listItems . '</ol>', render_breadcrumb('', $listItems));
    }

    public function testRenderBreadcrumbWithCustomClass()
    {
        $this->assertSame('<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs"></ol>', render_breadcrumb('breadcrumb-arrows'));
    }

    public function testRenderBreadcrumbWithCustomClassAndListItems()
    {
        $listItems = '<li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active" aria-current="page">Library</li>';

        $this->assertSame('<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">' . $listItems . '</ol>', render_breadcrumb('breadcrumb-arrows', $listItems));
    }
}
