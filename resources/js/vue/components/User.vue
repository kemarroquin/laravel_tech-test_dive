<template>
    <div>
        <table>
            <thead>
                <tr>
                    <th style="width: 15%;">Nombre</th>
                    <th style="width: 15%;">Email</th>
                    <th style="width: 10%;">Telefono</th>
                    <th style="width: 10%;">Género</th>
                    <th style="width: 10%;">Fecha Nacimiento</th>
                    <th style="width: 10%;">Ciudad</th>
                    <th style="width: 10%;">Pais</th>
                    <th style="width: 30%;">Direccion</th>
                    <th style="width: 10%;">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="(!users.length) && (!loading)">
                    <td colspan="7" style="text-align: center;">Sin registros</td>
                </tr>
                <tr v-for="user in users">
                    <td style="width: 15%;">{{ user.nombre }}</td>
                    <td style="width: 15%;">{{ user.correo_electronico }}</td>
                    <td style="width: 10%;">{{ user.telefono }}</td>
                    <td style="width: 10%;">{{ user.genero }}</td>
                    <td style="width: 10%;">{{ user.fecha_nacimiento }}</td>
                    <td style="width: 10%;">{{ user.ciudad }}</td>
                    <td style="width: 10%;">{{ user.pais }}</td>
                    <td style="width: 30%;">{{ user.direccion }}</td>
                    <td style="width: 10%;">{{ user.estado }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    async mounted() {
        await this.getUsers();
    },
    data() {
        return {
            users : [],
            loading: true
        }
    },
    methods: {
        async getUsers(){
            this.$axios.get('/api/user/all').then((res) =>{
                console.log(res.data);
                this.users = res.data.data;
            });
        }
    },
}

</script>