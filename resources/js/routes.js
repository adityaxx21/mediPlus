import Dashboard from './components/Dashboard.vue';
import AllClinic from './components/Clinic/AllClinic.vue';
import DetailClinic from './components/Clinic/DetailClinic.vue';
import CreateClinic from './components/Clinic/CreateClinic.vue';


export const routes = [
    {
        name: 'home',
        path: '/',
        component: Dashboard
    },
    {
        name: 'clinic',
        path: '/clinics',
        component: AllClinic
    },
    {
        name: 'clinicDetail',
        path: '/clinics/:id',
        component: DetailClinic
    },
    {
        name: 'clinicCreate',
        path: '/createClinic',
        component: CreateClinic
    }
];