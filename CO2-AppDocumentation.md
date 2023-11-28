# CO2 Calculator front-app documentation
Updated: 2023.11.28, zl

## Abstract
The code itself is hosted on dev server `co2-dev`. This document should help to contribute/update the code.

## File folders and structure
`public_html/app/Views/calculator`
- `_config.php`
- `_main.php`
- `script-*.php`
- `section-*.php`
- `style_common.php`

It's basically `javascript/html` code inside `php` files. Some PHP code is also provided.

Note: No resources from other folders are used for calculator app. Except main wrapper based on existed framework.

#### `_config.php`
Huge js-config file for all the bussiness requerments.

#### `_main.php`
Entry point and general flow.

#### `script-*.php`
Javascript code placed in separate files. Like `.js` files for html.

#### `section-*.php`
Calculator parts placed in separate files and included in `_main.php`.  

Each part has:
- html template for given section
- js render functions

#### `style_common.php`
CSS for current app.
