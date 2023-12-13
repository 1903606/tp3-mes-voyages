<template>
    <div class="container">
        <h2 class="text-center">Trips List</h2>
    
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'TripCreate' }" class="btn btn-primary btn-sm float-right mb-2">Add
                    Trip</router-link>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Country</th>
                            <th>Title</th>
                            <th>Story</th>
                            <th>Traveller</th>
                            <th>Image</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(trip, key) of trips" v-bind:key="key">
                            <td>{{ key + 1 }}</td>
                            <td>{{ trip.country }}</td>
                            <td>{{ trip.title }}</td>
                            <td>{{ trip.story }}</td>
                            <td>{{ trip.traveller }}</td>
                            <td>{{ trip.image }}</td>
                            <td>
                                <router-link class="btn btn-success btn-sm"
                                    :to="{ name: 'TripEdit', params: { tripId: trip.id } }">Edit</router-link>
                                <button class="btn btn-danger btn-sm" @click="deleteTrip(trip.id)">Delete</button>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            trips: {}
        }
    },
    created() {
        this.getTrips();
    },
    methods: {
        getTrips() {
            this.axios.get('http://127.0.0.1:8000/api/trips').then(response => {
                this.trips = response.data;
            }).catch(error => {
                console.log(error)
            })
        },
        deleteTrip(tripId) {
            this.axios
                .delete(`http://127.0.0.1:8000/api/trips/${tripId}`)
                .then(response => {
                    let i = this.trips.map(data => data.id).indexOf(tripId);
                    this.trips.splice(i, 1)
                });
        }
    }
}
</script>