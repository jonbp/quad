# Quad<a href="https://github.com/jonbp/quad"><img alt="WP-CLI Sync" src="https://jonbp.github.io/project-icons/quad.svg" width="40" height="40" align="right"></a>

[![GitHub Open Issues](https://img.shields.io/github/issues-raw/jonbp/quad)](https://github.com/jonbp/quad/issues)
[![GitHub Open Pull Requests](https://img.shields.io/github/issues-pr-raw/jonbp/quad)](https://github.com/jonbp/quad/pulls)

## About

A Tailwind (v4) + Vite WordPress starter theme for lean and fast development.

## Features

The theme makes heavy use of the templates folder to keep the root directory clean and organized.

The theme uses the following tools:

- [Tailwind CSS 4](https://tailwindcss.com/) — A utility-first CSS framework for rapid UI development.
- [Vite](https://vitejs.dev/) — A fast, modern build tool for bundling assets.

## Installation

1. Download the latest version of the theme from the [GitHub](https://github.com/jonbp/quad) repository and extract the contents into the `themes` directory of your WordPress installation.

2. Run `npm install` to install the required dependencies.

3. Run `npm run dev` to start a watched build that writes assets into `dist/`. Any changes to the template files are updated in the files. In the interests of performance, the theme does not include a live reload feature.

4. Run `npm run build` to create an optimized production build.

## Requirements

- [Node.js](https://nodejs.org/en/) — Tested with latest LTS version.
- [npm](https://www.npmjs.com/) — Bundled with Node.js.

## White Labeling

If you wish you can white label the theme by changing the following:

- `package.json` — Change the `name` and `description` fields.
- `quad_` instances across the theme. You can simply do a find and replace for `quad_` and replace it with your own prefix.
- `style.css` — Change the theme name, author, and description. This file is only used for the theme's metadata and is not used for the theme's styles.
- `src/css/app.css` — This theme uses a `qd` prefix for generated Tailwind classes. You can change this by updating the `prefix(qd);` line.

## Things to Note

- **jQuery** is removed from the theme. If you need it, you can restore it by removing `wp_deregister_script('jquery');` from the `quad_scripts` function in `functions.php`.
