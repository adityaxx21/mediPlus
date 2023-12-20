<template>
    <div>
        <h3 class="text-center">Edit clinic</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateClinic">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" v-model="clinic.nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori:</label>
                        <select id="kategori" v-model="clinic.kategori" class="form-control" required>
                            <option value="Rumah Sakit">Rumah Sakit</option>
                            <option value="Klinik">Klinik</option>
                            <option value="Praktek Dokter">Praktek Dokter</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" v-model="clinic.alamat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image URL:</label>
                        <input type="text" id="image" v-model="clinic.image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jam_buka">Jam Buka:</label>
                        <input type="time" id="jam_buka" v-model="clinic.jam_buka" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jam_tutup">Jam Tutup:</label>
                        <input type="time" id="jam_tutup" v-model="clinic.jam_tutup" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
export default {
    data() {
        return {
            clinic: {}
        }
    },
    created() {
        const token = localStorage.getItem('access_token');

        this.axios
            .get(`/api/clinics/${this.$route.params.id}`, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                },
            })
            .then((res) => {
                this.clinic = res?.data?.data?.data;
            });
    },
    methods: {

        updateClinic() {
            const token = localStorage.getItem('access_token');

            this.axios
                .patch(`/api/clinics/${this.$route.params.id}`, this.clinic, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    },
                })
                .then((res) => {
                    this.$router.push({ name: 'home' });
                });
        }
    }
}
</script>