# Quad<a href="https://github.com/jonbp/quad"><img alt="WP-CLI Sync" src="https://jonbp.github.io/project-icons/quad.svg" width="40" height="40" align="right"></a>

[![GitHub Open Issues](https://img.shields.io/github/issues-raw/jonbp/quad)](https://github.com/jonbp/quad/issues)
[![GitHub Open Pull Requests](https://img.shields.io/github/issues-pr-raw/jonbp/quad)](https://github.com/jonbp/quad/pulls)

## About

A Tailwind + Laravel Mix WordPress starter theme for lean and fast development.

## Features

The theme makes heavy use of the templates folder to keep the root directory clean and organized.

The theme uses the following tools:

- [Tailwind CSS](https://tailwindcss.com/) — A utility-first CSS framework for rapid UI development.
- [Laravel Mix](https://laravel-mix.com/) — An elegant wrapper around Webpack and simplifies the process of building assets.

## Installation

1. Download the latest version of the theme from the [GitHub](https://github.com/jonbp/quad) repository and extract the contents into the `themes` directory of your WordPress installation.

2. Run `npm install` to install the required dependencies.

3. Run `npm run watch` to start the development server. Any changes to the template files are updated in the files. In the interests of performance, the theme does not include a live reload feature.

4. Run `npm run production` to build the theme for production.

## Requirements

- [Node.js](https://nodejs.org/en/) — Tested with latest LTS version.
- [npm](https://www.npmjs.com/) — Bundled with Node.js.

## White Labeling

If you wish you can white label the theme by changing the following:

- `package.json` — Change the `name` and `description` fields.
- `quad_` instances across the theme. You can simply do a find and replace for `quad_` and replace it with your own prefix.
- `style.css` — Change the theme name, author, and description. This file is only used for the theme's metadata and is not used for the theme's styles.

## Things to Note

- **jQuery** is removed from the theme. If you need it, you can restore it by removing `wp_deregister_script('jquery');` from the `quad_scripts` function in `functions.php`.