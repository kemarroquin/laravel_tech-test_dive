<template lang="es">
    <div class="ppal_cnt">
        <header id="header">
            <div class="links">
                <router-link :to="{ name: 'index' }">Inicio</router-link>
                <router-link :to="{ name: 'company' }">Empresas</router-link>
                <router-link :to="{ name: 'user' }">Usuarios</router-link>
                <a href="/api/documentation" target="_blank">API Documentación</a>
            </div>
            <div class="theme_cnt">
                <Theme></Theme>
            </div>
        </header>

        <section id="content">
            <div id="subcontent">
                <router-view></router-view>
            </div>
        </section>

        <footer id="footer">
            <span>Copy &copy; {{ currentDate() }}</span>
        </footer>
    </div>
</template>


<script>

import Theme from './components/utils.js';

export default {
    data() {
        return {}
    },
    components: {
        Theme
    },
    methods: {
        currentDate(){
            function padTo2Digits(num) {
                return num.toString().padStart(2, '0');
            }
            let date = new Date();
            return [
                padTo2Digits(date.getDate()),
                padTo2Digits(date.getMonth() + 1),
                date.getFullYear(),
            ].join('-');
        }
    },
}

</script>