The Movie Portal - by Jose Peñaloza
===

In order to have the website working, just edit the `env.php` file inside the root of the theme and put your Movie DB API key instead of `YOUR_API_KEY_HERE` and done!

About the tools I've used
---------------

### Underscores theme for WordPress

Provides an architecture to develop modern sites:

- Using Sass preprocessor
- Using NodeJS

### Use

1. Open the theme directory on the console.
2. Execute the command `npm install`.
3. To convert your .sass files into .css ones every time you save them, use the command `npm run watch`.
4. All done!

### All the CLI commands

`_s` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
