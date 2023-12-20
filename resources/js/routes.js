import Dashboard from './components/Dashboard.vue';
import AllClinic from './components/Clinic/AllClinic.vue';
import DetailClinic from './components/Clinic/DetailClinic.vue';
import CreateClinic from './components/Clinic/CreateClinic.vue';
import EditClinic from './components/Clinic/EditClinic.vue';
import AllAntrian from './components/Antrian/AllAntrian.vue';
// import DetailAntrian from './components/Antrian/DetailAntrian.vue';
// import AssignAntrian from './components/Antrian/AssignAntrian.vue';
// import CreateAntrian from './components/Antrian/CreateAntrian.vue';
import Login from './components/Login.vue';


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
    },
    {
        name: 'clinicEdit',
        path: '/editClinic/:id',
        component: EditClinic
    },
    {
        name: 'antriansUsers',
        path: '/antrians/clinic/:clinicId/users/:userId',
        component: AllAntrian
    },
    {
        name: 'loginUser',
        path: '/login',
        component: Login
    },
];