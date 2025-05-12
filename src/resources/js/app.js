import '../css/app.css'
import './bootstrap'

import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createApp, h } from 'vue'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel'

createInertiaApp({
  title: title => `${title} - ${appName}`,
  resolve: name =>
    resolvePageComponent(
      `./Pages/${name}.vue`,
      import.meta.glob('./Pages/**/*.vue')
    ),
  setup({ el, App, props, plugin }) {
    // 1) Vue アプリインスタンスを作成
    const vueApp = createApp({
      render: () => h(App, props),
    })

    // 2) Inertia プラグイン & Ziggy を登録
    vueApp.use(plugin)
    vueApp.use(ZiggyVue)

    // 3) Devtools を有効化
    vueApp.config.devtools = true

    // 4) マウント
    vueApp.mount(el)

    return vueApp
  },
  progress: {
    color: '#4B5563',
  },
})