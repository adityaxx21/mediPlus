<template>
    <div class="container mt-5">
        <div class="row" :class="{ 'mt-4': hasAntrians, 'mt-2': !hasAntrians }">
            <template v-if="antrians.data && antrians.data.length > 0">
                <div v-for="antrian in antrians.data" :key="antrian.id" class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Tanggal: {{ antrian.tanggal }}</p>
                            <p class="card-text">Kuota: {{ antrian.kuota }}</p>
                            <p class="card-text">Harga: {{ antrian.harga }}</p>

                            <router-link :to="{ name: 'detail-antrians', params: { id: antrian.id } }"
                                class="btn btn-success">Detail Antrian</router-link>
                        </div>
                    </div>
                </div>
            </template>
            <template v-else>
                <div class="col">
                    <p>No antrians available</p>
                </div>
            </template>
        </div>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            antrians: [],
        };
    },
    computed: {
        hasAntrians() {
            return this.antrians.data && this.antrians.data.length > 0;
        },
    },
    created() {
        const clinicId = this.$route.params.clinicId;
        const userId = this.$route.params.userId;

        this.axios
            .get(`/api/antrians/clinics/${clinicId}/users/${userId}`)
            .then(response => {
                this.antrians = response?.data?.data;
                console.log(this.antrians);

                if (response?.error) {
                    console.log(response?.error?.message);
                }
            }).catch(error => {
                console.error('Error fetching antrians data:', error);
            });


    },
};
</script>
  
<style scoped>
.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-img-top {
    object-fit: cover;
    height: 200px;
}

.card-title {
    color: #333;
    margin-bottom: 0.5rem;
}

.card-text {
    color: #555;
    margin-bottom: 0.2rem;
}
</style>
  