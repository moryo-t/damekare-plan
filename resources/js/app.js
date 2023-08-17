require("./bootstrap");

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent'
import HeaderComponent from './components/HeaderComponent'
import MapComponent from './components/MapComponent'

const app = createApp({
    components: {
        ExampleComponent,
        HeaderComponent,
        MapComponent,
    },
})
app.mount('#app')