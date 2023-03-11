require("./bootstrap");

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent'
import HeaderComponent from './components/HeaderComponent'

createApp({
    components: {
        ExampleComponent,
        HeaderComponent,
    },
}).mount('#app')




