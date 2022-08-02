import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

/*
 |--------------------------------------------------------------------------
 | Midone Built-in Components
 |--------------------------------------------------------------------------
 |
 | Import Midone built-in components.
 |
 */
import './bootstrap'
import '@left4code/tw-starter/dist/js/svg-loader'
import '@left4code/tw-starter/dist/js/accordion'
import '@left4code/tw-starter/dist/js/alert'
import '@left4code/tw-starter/dist/js/dropdown'
import '@left4code/tw-starter/dist/js/modal'
import '@left4code/tw-starter/dist/js/tab'

/*
 |--------------------------------------------------------------------------
 | 3rd Party Libraries
 |--------------------------------------------------------------------------
 |
 | Import 3rd party library JS files.
 |
 */
import './components/feather'
import './components/tippy'
import './components/datepicker'
import './components/tom-select'
import './components/dropzone'

/*
 |--------------------------------------------------------------------------
 | Custom Components
 |--------------------------------------------------------------------------
 |
 | Import JS custom components.
 |
 */
import './components/show-modal'
import './components/show-slide-over'
import './components/show-dropdown'
import './components/side-menu'
import './components/mobile-menu'
import './components/side-menu-tooltip'
import './components/new-dark-mode-switcher'
