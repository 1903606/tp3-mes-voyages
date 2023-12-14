<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link :to="{ name: 'TripIndex' }"  class="nav-item nav-link">Trips</router-link>
                    <router-link :to="{ name: 'TripApropos' }"  class="nav-item nav-link">A propos</router-link>

                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>
<script>
    export default {}
</script>