<template lang="es">
    <button id="btn-darktheme" @click="changeTheme">
        <span class="material-symbols-outlined">brightness_4</span>
    </button>
</template>

<script>

export default {
    mounted() {
        const el = document.documentElement;
        const auxtheme = el.getAttribute('data-theme');
        if(localStorage.getItem('VueTechTestDive-theme') === null){
            localStorage.setItem('VueTechTestDive-theme', auxtheme);
        }
        this.changeTheme(false);
    },
    methods: {
        changeTheme(flag = true){
            const el = document.documentElement;
            if(flag){
                const theme = localStorage.getItem('VueTechTestDive-theme');
                localStorage.setItem(
                    'VueTechTestDive-theme',
                    ((theme === 'dark') ? '' : 'dark')
                );
            }
            el.setAttribute('data-theme', localStorage.getItem('VueTechTestDive-theme'));
        }
    },
}

</script>