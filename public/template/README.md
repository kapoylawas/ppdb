<<<<<<< HEAD
# [AdminLTE - Bootstrap 4 Admin Dashboard](https://adminlte.io)

[![npm version](https://img.shields.io/npm/v/admin-lte/latest.svg)](https://www.npmjs.com/package/admin-lte)
[![Packagist](https://img.shields.io/packagist/v/almasaeed2010/adminlte.svg)](https://packagist.org/packages/almasaeed2010/adminlte)
[![cdn version](https://data.jsdelivr.com/v1/package/npm/admin-lte/badge)](https://www.jsdelivr.com/package/npm/admin-lte)
[![Gitpod Ready-to-Code](https://img.shields.io/badge/Gitpod-Ready--to--Code-blue?logo=gitpod)](https://gitpod.io/from-referrer/)

**AdminLTE** is a fully responsive administration template. Based on **[Bootstrap 4.6](https://getbootstrap.com/)** framework and also the JS/jQuery plugin.
Highly customizable and easy to use. Fits many screen resolutions from small mobile devices to large desktops.

**Preview on [AdminLTE.io](https://adminlte.io/themes/v3)**

## Looking for Premium Templates?

AdminLTE.io just opened a new premium templates page. Hand picked to ensure the best quality and the most affordable
prices. Visit <https://adminlte.io/premium> for more information.

!["AdminLTE Presentation"](https://adminlte.io/AdminLTE3.png "AdminLTE Presentation")

**AdminLTE** has been carefully coded with clear comments in all of its JS, SCSS and HTML files.
SCSS has been used to increase code customizability.

## Quick start
There are multiple ways to install AdminLTE.

### Download & Changelog:
Always Recommended to download from GitHub latest release [AdminLTE 3](https://github.com/ColorlibHQ/AdminLTE/releases/latest) for bug free and latest features.\
Visit the [releases](https://github.com/ColorlibHQ/AdminLTE/releases) page to view the changelog.\
Legacy Releases are [AdminLTE 2](https://github.com/ColorlibHQ/AdminLTE/releases/tag/v2.4.18) / [AdminLTE 1](https://github.com/ColorlibHQ/AdminLTE/releases/tag/1.3.1).

## Stable release
### Grab from [jsdelivr](https://www.jsdelivr.com/package/npm/admin-lte) CDN:
_**Important Note**: You needed to add separately cdn links for plugins in your project._
```html
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
```
```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
```
### Using The Command Line:
_**Important Note**: To install it via npm/Yarn, you need at least Node.js 10 or higher._
#### Via npm
```bash
npm install admin-lte@^3.1 --save
```
#### Via Yarn
```bash
yarn add admin-lte@^3.1
```
#### Via Composer
```bash
composer require "almasaeed2010/adminlte=~3.1"
```
#### Via Git
```bash
git clone https://github.com/ColorlibHQ/AdminLTE.git
```

## Unstable release
### Grab from [jsdelivr](https://www.jsdelivr.com/package/npm/admin-lte) CDN:
_**Important Note**: You needed to add separately cdn links for plugins in your project._
```html
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
```
```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">
```
### Using The Command Line:
_**Important Note**: To install it via npm/Yarn, you need at least Node.js 10 or higher._
#### Via npm
```bash
npm install admin-lte@^3.1.0 --save
```
#### Via Yarn
```bash
yarn add admin-lte@^3.1.0
```
#### Via Composer
```bash
composer require "almasaeed2010/adminlte=~3.1.0"
```
#### Via Git
```bash
git clone https://github.com/ColorlibHQ/AdminLTE.git
```

## Documentation

Visit the [online documentation](https://adminlte.io/docs/3.1/) for the most
updated guide. Information will be added on a weekly basis.

## Browsers support

| [<img src="https://raw.githubusercontent.com/alrra/browser-logos/master/src/edge/edge_48x48.png" alt="IE / Edge" width="24px" height="24px" />](http://godban.github.io/browsers-support-badges/)<br/>IE / Edge | [<img src="https://raw.githubusercontent.com/alrra/browser-logos/master/src/firefox/firefox_48x48.png" alt="Firefox" width="24px" height="24px" />](http://godban.github.io/browsers-support-badges/)<br/>Firefox | [<img src="https://raw.githubusercontent.com/alrra/browser-logos/master/src/chrome/chrome_48x48.png" alt="Chrome" width="24px" height="24px" />](http://godban.github.io/browsers-support-badges/)<br/>Chrome | [<img src="https://raw.githubusercontent.com/alrra/browser-logos/master/src/safari/safari_48x48.png" alt="Safari" width="24px" height="24px" />](http://godban.github.io/browsers-support-badges/)<br/>Safari | [<img src="https://raw.githubusercontent.com/alrra/browser-logos/master/src/safari-ios/safari-ios_48x48.png" alt="iOS Safari" width="24px" height="24px" />](http://godban.github.io/browsers-support-badges/)<br/>iOS Safari | [<img src="https://raw.githubusercontent.com/alrra/browser-logos/master/src/samsung-internet/samsung-internet_48x48.png" alt="Samsung" width="24px" height="24px" />](http://godban.github.io/browsers-support-badges/)<br/>Samsung | [<img src="https://raw.githubusercontent.com/alrra/browser-logos/master/src/opera/opera_48x48.png" alt="Opera" width="24px" height="24px" />](http://godban.github.io/browsers-support-badges/)<br/>Opera | [<img src="https://raw.githubusercontent.com/alrra/browser-logos/master/src/vivaldi/vivaldi_48x48.png" alt="Vivaldi" width="24px" height="24px" />](http://godban.github.io/browsers-support-badges/)<br/>Vivaldi | [<img src="https://raw.githubusercontent.com/alrra/browser-logos/master/src/electron/electron_48x48.png" alt="Electron" width="24px" height="24px" />](http://godban.github.io/browsers-support-badges/)<br/>Electron |
| --------- | --------- | --------- | --------- | --------- | --------- | --------- | --------- | --------- |
| IE10, IE11, Edge| last 2 versions| last 2 versions| last 2 versions| last 2 versions| last 2 versions| last 2 versions| last 2 versions| last 2 versions

### Compile dist files

To compile the dist files you need Node.js/npm, clone/download the repo then:

1. `npm install` (install npm deps)
2. _Optional:_ `npm run dev` (developer mode, autocompile with browsersync support for live demo)
3. `npm run production` (compile css/js files)


## Contributing

Please read through our [contributing guidelines](https://github.com/ColorlibHQ/AdminLTE/tree/master/.github/CONTRIBUTING.md). Included are directions for opening issues, coding standards, and notes on development.

Editor preferences are available in the [editor config](https://github.com/twbs/bootstrap/blob/main/.editorconfig) for easy use in common text editors. Read more and download plugins at <https://editorconfig.org/>.


## License

AdminLTE is an open source project by [AdminLTE.io](https://adminlte.io) that is licensed under [MIT](https://opensource.org/licenses/MIT).
AdminLTE.io reserves the right to change the license of future releases.

## Image Credits

- [Pixeden](http://www.pixeden.com/psd-web-elements/flat-responsive-showcase-psd)
- [Graphicsfuel](https://www.graphicsfuel.com/2013/02/13-high-resolution-blur-backgrounds/)
- [Pickaface](https://pickaface.net/)
- [Unsplash](https://unsplash.com/)
- [Uifaces](http://uifaces.com/)
=======
Introduction
============

![Bower version](https://img.shields.io/bower/v/adminlte.svg)
[![npm version](https://img.shields.io/npm/v/admin-lte.svg)](https://www.npmjs.com/package/admin-lte)
[![Packagist](https://img.shields.io/packagist/v/almasaeed2010/adminlte.svg)](https://packagist.org/packages/almasaeed2010/adminlte)
[![CDNJS](https://img.shields.io/cdnjs/v/admin-lte.svg)](https://cdnjs.com/libraries/admin-lte)

**AdminLTE** -- is a fully responsive admin template. Based on **[Bootstrap 3](https://github.com/twbs/bootstrap)** framework. Highly customizable and easy to use. Fits many screen resolutions from small mobile devices to large desktops. Check out the live preview now and see for yourself.

**Download & Preview on [AdminLTE.IO](https://adminlte.io)**

### Looking for Premium Templates?
**AdminLTE.IO just opened a new premium templates website. Hand picked to ensure the best quality and the most affordable prices. Visit https://themequarry.com for more information.**

## Documentation & Installation Guide
Visit the [online documentation](https://adminlte.io/docs) for the most
updated guide.

!["AdminLTE Presentation"](https://adminlte.io/AdminLTE2.png "AdminLTE Presentation")

### Contribution
Contribution are always **welcome and recommended**! Here is how:

- Fork the repository ([here is the guide](https://help.github.com/articles/fork-a-repo/)).
- Clone to your machine ```git clone https://github.com/YOUR_USERNAME/AdminLTE.git```
- Make your changes
- Create a pull request

#### Contribution Requirements:

- When you contribute, you agree to give a non-exclusive license to AdminLTE.IO to use that contribution in any context as we (AdminLTE.IO) see appropriate.
- If you use content provided by another party, it must be appropriately licensed using an [open source](http://opensource.org/licenses) license.
- Contributions are only accepted through Github pull requests.
- Finally, contributed code must work in all supported browsers (see above for browser support).

### License
AdminLTE is an open source project by [AdminLTE.IO](https://adminlte.io) that is licensed under [MIT](http://opensource.org/licenses/MIT). AdminLTE.IO
reserves the right to change the license of future releases. Wondering what you can or can't do? View the [license guide](https://adminlte.io/docs/license).

### Legacy Releases
AdminLTE 1.x can be easily upgraded to 2.x using [this guide](https://adminlte.io/themes/AdminLTE/documentation/index.html#upgrade), but if you intend to keep using AdminLTE 1.x, you can download the latest release from the [releases](https://github.com/almasaeed2010/AdminLTE/releases) section above.

### Change log
**For the most recent change log, visit the [releases page](https://github.com/almasaeed2010/AdminLTE/releases) or the [changelog file](https://github.com/almasaeed2010/AdminLTE/blob/master/changelog.md).** We will add detailed release notes to each new release. 

### Image Credits
- [Pixeden](http://www.pixeden.com/psd-web-elements/flat-responsive-showcase-psd)
- [Graphicsfuel](http://www.graphicsfuel.com/2013/02/13-high-resolution-blur-backgrounds/)
- [Pickaface](http://pickaface.net/)
- [Unsplash](https://unsplash.com/)
- [Uifaces](http://uifaces.com/)

### Donations
Donations are **greatly appreciated!**

[![Donate](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif "AdminLTE Presentation")](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=629XCUSXBHCBC "Donate")
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
