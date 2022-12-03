require("./bootstrap");

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent'
import AppComponent from './components/AppComponent'

createApp({
    components: {
        'app-component': AppComponent,
    },
}).mount('#app')




