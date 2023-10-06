# Codeigniter Breadcrumbs

The CodeIgniter Breadcrumb Library assists in generating and rendering breadcrumb navigation based on the current URL segments. It is specifically designed to seamlessly integrate with the CodeIgniter framework. This library simplifies the process of creating breadcrumb navigation by automatically tracking the user's navigation path within your application. It dynamically generates the breadcrumb trail based on the current URL segments, making it effortless to implement and maintain.

![PHP](https://img.shields.io/badge/PHP-%5E8.1-blue)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-%5E4.3-blue)

## Installation

Installation is done through Composer.

```console
composer require ictsolutions/codeigniter-breadcrumbs
```
## Configuration

The library's default behavior can be overridden or augmented by its config file. Copy `examples/Breadcrumb.php` to `app/Config/Breadcrumb.php` and follow the instructions in the comments. If no config file is found the library will use its default. In the Breadcrumb class, you can set the following configuration options:

`$isTranslatable`

- Description: Specifies whether the breadcrumbs will be translatable or not. If set to `true` then inside the Language folder, create a new file named `Breadcrumb.php`. This will be the language file for your breadcrumbs.
- Type: bool
- Default: false

`$style`

- Description: Sets the desired style for the breadcrumb navigation.
- Type: string
- Allowed Values: 'tabler', 'bootstrap5'
- Default: 'tabler'

## Helpers

This repository contains two helper functions that allow you to use the `Breadcrumb` class more easily in your CodeIgniter project:

- `render_breadcrumb()`: Renders the breadcrumb navigation through the `Breadcrumb` service.
- `replace_breadcrumb_params()`: Replaces all numeric text in breadcrumb links with new parameters through the `Breadcrumb` service.

## Usage

#### `render_breadcrumb()`

This function renders the breadcrumb navigation through the `Breadcrumb` service.

To use this function, simply call `render_breadcrumb()` from your **view** where you want the breadcrumb navigation to appear. You can optionally pass a CSS class name to style the container element for the breadcrumb navigation. For example:

```php
<?= render_breadcrumb('my-custom-class'); ?>
```

#### `replace_breadcrumb_params()`

This function replaces all numeric text in breadcrumb links with new parameters through the `Breadcrumb` service.


To use this function, simply call `replace_breadcrumb_params()` from your controller, passing in an array of new parameters. For example:

```php
$newParams = ['Home', 'New Category', 'Product Name'];
replace_breadcrumb_params($newParams);
```

This will replace any numeric text parameters in the breadcrumb links with the corresponding values from `$newParams`.

Note that you must have already created an instance of the `Breadcrumb` class and set it up with the appropriate links before calling this function.

## Example: Creating a CodeIgniter Project with Breadcrumbs

To create a CodeIgniter project with breadcrumbs, follow these steps:

1. Initialize a new CodeIgniter project by running the following command in your terminal or shell:

```sh
composer create-project codeigniter4/appstarter ci4-breadcrumbs
```

This will create a new CodeIgniter project named "ci4-breadcrumbs" using the CodeIgniter 4 starter template.

2. Install the breadcrumbs library by running the following command in your terminal or shell:

```sh
composer require ictsolutions/codeigniter-breadcrumbs
```
This will install the "ictsolutions/codeigniter-breadcrumbs" library into your project.

3. In the `Home` controller of your CodeIgniter project, add two new methods: `foo()` and `bar()`. You can add these methods to the existing `Home` controller file (`app/Controllers/Home.php`). Here is an example of how to add the methods:

```diff
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

+   public function foo(): string
+   {
+       return view('foo-bar');
+   }
+
+   public function bar(): string
+   {
+       return view('foo-bar');
+   }
}
```

4. In the `Routes` configuration file (`app/Config/Routes.php`), add two new routes for the `foo()` and `bar()` methods. Here is an example of how to add the routes:

```diff
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
+$routes->get('foo', 'Home::foo');
+$routes->get('foo/bar', 'Home::bar');
```

5. In the `Views` folder of your CodeIgniter project, create a new view file named `foo-bar.php` and add the following content to it:

```php
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Breadcrumbs demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <?= render_breadcrumb() ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
```

This view file contains HTML markup with Bootstrap CSS and JavaScript included. It also includes a call to the `render_breadcrumb()` function, which you can customize as per your requirements.

6. Inside the Language folder, create a new file named `Breadcrumb.php`. This will be the language file for your breadcrumbs. Open the `Breadcrumb.php` file and add your breadcrumb translations using the CodeIgniter language array format. For example:

```php
<?php

// app/Language/en/Breadcrumb.php
return [
    'foo' => 'Foo',
    'bar' => 'Bar'
];
```

This is an example of the English translation for the breadcrumbs. You can create additional files for different languages or modify the existing file to add translations in different languages.

7. Finally, you can visit `http://localhost:8080/foo/bar` in your web browser to see the result. This URL will trigger the `bar()` method in the `Home` controller and display the `foo-bar.php` view with the Bootstrap styling and the breadcrumb content.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
