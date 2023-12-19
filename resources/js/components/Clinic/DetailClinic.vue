<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <img :src="clinic.image" class="card-img-top" alt="Clinic Image">
                    <div class="card-body">
                        <h2 class="card-title">{{ clinic.nama }}</h2>
                        <p class="card-text">{{ clinic.kategori }}</p>
                        <p class="card-text">{{ clinic.alamat }}</p>
                        <p class="card-text">Opening Hours: {{ clinic.jam_buka }} - {{ clinic.jam_tutup }}</p>
                    </div>
                </div>
            </div>
        </div>

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
            clinic: {},
            antrians: [],
        };
    },
    mounted() {
        const clinicId = this.$route.params.id;
        // Make the request using Axios to get clinic details based on the ID
        this.axios
            .get(`/api/clinics/${clinicId}`)
            .then(response => {
                this.clinic = response?.data?.data?.data;
            })
            .catch(error => {
                console.error('Error fetching clinic details:', error);
            });
    },
    computed: {
        hasAntrians() {
            return this.antrians.data && this.antrians.data.length > 0;
        },
    },
    created() {
        const clinicId = this.$route.params.id;

        this.axios
            .get(`/api/antrians/clinics/${clinicId}`)
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
  