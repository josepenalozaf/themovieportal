The Movie Portal - by Jose Peñaloza
===

In order to have the website working, just follow the next steps:

1. Do a clean installation of WordPress.
2. Clone this repository into the `wp-content/themes/` folder using the command `git clone https://github.com/josepenalozaf/themovieportal.git themovieportal`
3. Edit the `env.php` file inside the theme folder and put your Movie DB API key instead of `YOUR_API_KEY_HERE`.
3. Activate the theme on your WordPress dashboard in `Appearance > Themes`.
4. You're all set, you can go and check your WordPress site now!

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

Underscores `_s` comes packed with CLI commands tailored for WordPress theme development:

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
