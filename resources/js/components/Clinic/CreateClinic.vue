<template>
    <div class="container mt-5">
        <h2>Create Clinic</h2>
        <form @submit.prevent="submitForm">
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

            <button type="submit" class="btn btn-primary">Create Clinic</button>
        </form>
    </div>
</template>
  
<script>

export default {
    data() {
        return {
            clinic: {
                nama: '',
                kategori: 'Rumah Sakit',
                alamat: '',
                image: '',
                jam_buka: '',
                jam_tutup: '',
            },
        };
    },
    methods: {
        submitForm() {
            console.log(this.clinic);
            this.axios
                .post('/api/clinics', this.clinic)
                .then(response => {
                    // Handle success, you can redirect or show a success message
                    this.$router.push({ name: 'clinic' })
                    console.log('Clinic created successfully:', response.data);
                })
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        },
    },
};
</script>
  