# bhghneo.org

Custom Wordpress theme.
_This theme requires [ACF PRO](https://www.advancedcustomfields.com/)_

## Installing / Getting started

This is the bare minimum to get the project running in development mode. For a more detailed explanation, [see below](#development).

```shell
npm install
npm run debug
```

The first command will install all the necessary dependencies for the project. The second command will build your project to the `./dist` directory and display it in the browser in development mode.

## Development

### Prerequisites

- [Node.js](https://nodejs.org/en/) - v7.6.0+

### Setup

```shell
cd to/target/directory
git clone /to/origin/repo.git .
wp core download
wp core config --dbhost=localhost --dbuser=root --dbpass=root --dbname=theDatabase --dbprefix=wp_
npm install
```

### Running Local Server

Spin up a local development server with Browsersync.

```shell
npm run debug
```

## Building for Production

Minify assets for production.

```shell
npm run build
```
