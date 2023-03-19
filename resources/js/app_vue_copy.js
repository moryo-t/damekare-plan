require("./bootstrap");

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent'
import HeaderComponent from './components/HeaderComponent'

const app = createApp({
    components: {
        ExampleComponent,
        HeaderComponent,
    },
})
app.mount('#app')