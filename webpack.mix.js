const mix = require('laravel-mix')
const exec = require('child_process').exec
require('dotenv').config()

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const glob = require('glob')
const path = require('path')

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
  ; (glob.sync('resources/' + query) || []).forEach(f => {
    f = f.replace(/[\\\/]+/g, '/')
    cb(f, f.replace('resources', 'public'))
  })
}

const sassOptions = {
  precision: 5,
  includePaths: ['node_modules', 'resources/assets/'],
  postCss: [
    require('autoprefixer'),
    require('postcss-preset-env')({ stage: 0, browsers: 'last 2 versions' })]
}

// plugins Core stylesheets
mixAssetsDir('scss/base/plugins/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, dest.replace(/(\\|\/)scss(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), { sassOptions })
)

// pages Core stylesheets
mixAssetsDir('scss/base/pages/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, dest.replace(/(\\|\/)scss(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), { sassOptions })
)

// Core stylesheets
mixAssetsDir('scss/base/core/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, dest.replace(/(\\|\/)scss(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), { sassOptions })
)

mixAssetsDir('scss/frontend/**/!(_)*.scss', (src, dest) =>
  mix.sass(src, 'public/css/client', { sassOptions })
)


// script js
mixAssetsDir('js/scripts/**/*.js', (src, dest) => mix.minify(src, dest))
// mixAssetsDir('js/frontend/**/*.js', (src, dest) => mix.js(src, 'public/js/client'))

/*
 |--------------------------------------------------------------------------
 | Application assets
 |--------------------------------------------------------------------------
 */

mixAssetsDir('vendors/js/**/*.js', (src, dest) => mix.scripts(src, dest))
mixAssetsDir('vendors/css/**/*.css', (src, dest) => mix.copy(src, dest))
// mixAssetsDir('vendors/**/**/images', (src, dest) => mix.copy(src, dest))
// mixAssetsDir('vendors/css/editors/quill/fonts/', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts/**/**/*.css', (src, dest) => mix.copy(src, dest))
mix.copyDirectory('resources/images', 'public/images')
// mix.copyDirectory('resources/data', 'public/data')

mix
  .js('resources/js/core/app-menu.js', 'public/js/core')
  .js('resources/js/core/app.js', 'public/js/core')
  // .js('resources/js/core/app-client.js', 'public/js/core')
  .js('resources/assets/js/scripts.js', 'public/js/core')
  .combine(['resources/js/frontend/global__core.js', 'resources/js/frontend/global__jq.js'], 'public/js/client/global.js', true)
  .combine(['resources/vendors/js/waves/waves.min.js', 'resources/vendors/js/pace/pace.min.js', 'resources/js/core/app-client.js'], 'public/js/client/client-vendors.js', true)
  .js('resources/js/frontend/home.js', 'public/js/client/home.js')
  .js('resources/js/frontend/gallery.js', 'public/js/client/gallery.js')
  .js('resources/js/scripts/pages/app-user-list.js', 'public/js/core/pages/')
  .sass('resources/scss/base/themes/dark-layout.scss', 'public/css/base/themes', { sassOptions })
  .sass('resources/scss/base/themes/bordered-layout.scss', 'public/css/base/themes', { sassOptions })
  .sass('resources/scss/base/themes/semi-dark-layout.scss', 'public/css/base/themes', { sassOptions })
  .sass('resources/scss/core.scss', 'public/css', { sassOptions })
  .sass('resources/scss/core-client.scss', 'public/css', { sassOptions })
  .sass('resources/scss/overrides.scss', 'public/css', { sassOptions })
  .sass('resources/scss/base/custom-rtl.scss', 'public/css-rtl', { sassOptions })
  .sass('resources/assets/scss/style-rtl.scss', 'public/css-rtl', { sassOptions })
  .sass('resources/assets/scss/style.scss', 'public/css', { sassOptions })
  .sass('resources/assets/scss/tailwind.scss', 'public/css', { sassOptions })
  .options({
    processCssUrls: true,
    postCss: [require('autoprefixer')]
  })
  .version();

mix.then(() => {
  if (process.env.MIX_CONTENT_DIRECTION === 'rtl') {
    let command = `node ${path.resolve('node_modules/rtlcss/bin/rtlcss.js')} -d -e ".css" ./public/css/ ./public/css/`
    exec(command, function (err, stdout, stderr) {
      if (err !== null) {
        console.log(err)
      }
    })
  }
})

// if (mix.inProduction()) {
//   mix.version()
//   mix.webpackConfig({
//     output: {
//       publicPath: '/demo/vuexy-bootstrap-laravel-admin-template-new/demo-2/'
//     }
//   })
//   mix.setResourceRoot('/demo/vuexy-bootstrap-laravel-admin-template-new/demo-2/')
// }

/*
 |--------------------------------------------------------------------------
 | Browsersync Reloading
 |--------------------------------------------------------------------------
 |
 | BrowserSync can automatically monitor your files for changes, and inject your changes into the browser without requiring a manual refresh.
 | You may enable support for this by calling the mix.browserSync() method:
 | Make Sure to run `php artisan serve` and `yarn watch` command to run Browser Sync functionality
 | Refer official documentation for more information: https://laravel.com/docs/9.x/mix#browsersync-reloading
 */

// mix.browserSync('http://127.0.0.1:8000/')
