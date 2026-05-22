import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import Layout from "../js/Layouts/Layout.vue"
import {ZiggyVue} from '../../vendor/tightenco/ziggy'

createInertiaApp({
    title: title => `AceMakers ${title || ''}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)

        app.component('Link', Link)
        app.component('Head', Head)

        app.mount(el)
    },
    progress:{
        delay:250,
        color:'white',
        includeCSS:true,
        showSpinner:false,
    },
})
