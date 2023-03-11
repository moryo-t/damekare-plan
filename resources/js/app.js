require("./bootstrap");

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent'
import HeaderComponent from './components/HeaderComponent'
import FadeInComponent from './components/FadeInComponent'

createApp({
    components: {
        ExampleComponent,
        HeaderComponent,
        FadeInComponent,
    },
}).mount('#app')




