
<style>
.card-img-top {
    object-fit: cover;
    /* Maintain aspect ratio and cover the entire container */
    height: 200px;
    /* Adjust the height as needed */
}
</style>

<template>
    <div>
        <h2 class="text-center">Clinics List</h2>
        <div class="container mt-5">
            <div class="row">
                <template v-if="clinics.data && clinics.data.length > 0">
                    <div v-for="clinic in clinics.data" :key="clinic.id" class="col-md-4 mb-4">
                        <div class="card">
                            <img :src="clinic.image" class="card-img-top" alt="Clinic Image">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <router-link :to="'/clinics/' + clinic.id" class="nav-item nav-link">
                                        {{ clinic.nama }}
                                    </router-link>
                                </h5>
                                <p class="card-text">Category: {{ clinic.kategori }}</p>
                                <p class="card-text">Address: {{ clinic.alamat }}</p>
                                <p class="card-text">Opening Hours: {{ clinic.jam_buka }} - {{ clinic.jam_tutup }}</p>

                                <div class="btn-group" role="group">
                                    <router-link :to="{ name: 'editClinic', params: { id: clinic.id } }"
                                        class="btn btn-success">Edit</router-link>
                                    <button class="btn btn-danger" @click="deleteClinic(clinic.id)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <div class="col">
                        <p>No clinics available</p>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
 
<script>
export default {
    data() {
        return {
            clinics: []
        }
    },
    created() {
        this.fetchClinics(); // Call the method to fetch clinics when the component is created
    },
    methods: {
        fetchClinics() {
            const token = localStorage.getItem('access_token');
            this.axios
                .get('/api/clinics/', {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    },
                })
                .then(response => {
                    this.clinics = response?.data?.data;

                    if (response?.error) {
                        console.log(response?.error?.message);
                    }
                });
        },
        deleteClinic(id) {
            const token = localStorage.getItem('access_token');
            this.axios
                .delete(`/api/clinics/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    },
                })
                .then(response => {
                    window.location.reload();
                });
        }
    }
}
</script>