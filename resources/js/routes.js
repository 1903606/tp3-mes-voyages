import TripIndex from './components/trips/index.vue';
import TripCreate from './components/trips/create.vue';
import TripEdit from './components/trips/edit.vue';
import TripShow from './components/trips/show.vue';

export const routes = [
    {
        path: '/trips',
        component: TripIndex,
        name: "TripIndex"
    },
    {
        path: '/trips/create',
        component: TripCreate,
        name: "TripCreate"
    },
    {
        path: '/trips/edit/:tripId',
        component: TripEdit,
        name: "TripEdit"
    },
   /*  {
        path: '/trips/autocomplete',
        component: TripIndex,
        name: "TripIndex"
    } */
];