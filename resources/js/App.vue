<template>
    <div class="container"> 
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
          <div class="navbar-nav">
            <router-link to="/" class="nav-item nav-link">Dashboard</router-link>
            <router-link to="/clinics" class="nav-item nav-link">Clinic</router-link>
          </div>
        </div>
        
        <!-- User Profile Dropdown -->
        <div class="ml-auto">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              User Name
            </button>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
              <router-link to="/profile" class="dropdown-item">Profile</router-link>
              <div class="dropdown-divider"></div>
              <button class="dropdown-item" @click="logout">Logout</button>
            </div>
          </div>
        </div>
      </nav>
  
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      logout() {
        // Add your logout logic here
        console.log('Logout clicked');
      }
    }
  }
  </script>
  