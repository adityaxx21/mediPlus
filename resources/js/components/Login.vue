<template>
    <div class="container mt-5">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Login</h2>
  
          <form @submit.prevent="login">
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" v-model="email" required>
            </div>
  
            <div class="mb-3">
              <label for="password" class="form-label">Password:</label>
              <input type="password" class="form-control" v-model="password" required>
            </div>
  
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
  
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        email: '',
        password: '',
      };
    },
    methods: {
      login() {
        const credentials = {
          email: this.email,
          password: this.password,
        };
  
        axios.post('/api/login', credentials)
          .then(response => {
            const token = response?.data?.data;
  
            // Handle successful login
            localStorage.setItem('access_token', token.data);
            console.log('Login successful', response.data);
  
            // Example: Redirect to the home page after successful login
            this.$router.push({ name: 'home' });
          })
          .catch(error => {
            // Handle login error
            console.error('Login error', error.response.data);
          });
      },
    },
  };
  </script>
  