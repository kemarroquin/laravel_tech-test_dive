<template>
    <div>
        <table>
            <thead>
                <tr>
                    <th style="width: 15%;">Nombre</th>
                    <th style="width: 15%;">Email</th>
                    <th style="width: 10%;">Telefono</th>
                    <th style="width: 10%;">Ciudad</th>
                    <th style="width: 10%;">Pais</th>
                    <th style="width: 30%;">Direccion</th>
                    <th style="width: 10%;">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="(!companies.length) && (!loading)">
                    <td colspan="7" style="text-align: center;">Sin registros</td>
                </tr>
                <tr v-for="company in companies">
                    <td style="width: 15%;">{{ company.nombre }}</td>
                    <td style="width: 15%;">{{ company.correo_electronico }}</td>
                    <td style="width: 10%;">{{ company.telefono }}</td>
                    <td style="width: 10%;">{{ company.ciudad }}</td>
                    <td style="width: 10%;">{{ company.pais }}</td>
                    <td style="width: 30%;">{{ company.direccion }}</td>
                    <td style="width: 10%;">{{ company.status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    async mounted() {
        await this.getCompanies();
    },
    data() {
        return {
            companies : [],
            loading: true
        }
    },
    methods: {
        async getCompanies(){
            this.$axios.get('/api/company/all').then((res) =>{
                console.log(res.data);
                this.companies = res.data.data;
            });
        }
    },
}

</script>