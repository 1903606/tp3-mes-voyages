<template>
    <div class="container">
        <h2 class="text-center">Update Trip</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'TripIndex' }" class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" v-model="trip.country">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="trip.title">
                    </div>
                    <div class="form-group">
                        <label>Story</label>
                        <textarea type="text" rows="5" class="form-control" v-model="trip.story"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Traveller</label>
                        <input type="text" class="form-control" v-model="trip.traveller">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="button" class="btn btn-primary" @click="updateTrip()"> Update </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            trip: {}
        }
    },
    mounted() {
        this.editTrip(this.$route.params.tripId);
    },
    methods: {
        editTrip(tripId) {
            this.axios.get(`http://127.0.0.1:8000/api/trips/${tripId}`)
                .then((response) => {
                    this.product = response.data;
                });
        },
        updateTrip() {
            this.axios
                .patch(`http://127.0.0.1:8000/api/trips/${this.$route.params.tripId}`, this.trip)
                .then((response) => {
                    this.$router.push({ name: 'TripIndex' });
                });
        }
    }
}
</script>