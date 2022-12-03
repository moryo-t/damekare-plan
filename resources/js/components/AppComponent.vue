<template>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                isMenu: false,
            }
        },
        methods: {
            toggleMenu () {
                this.isMenu = !this.isMenu
            },
        },
    }



</script>