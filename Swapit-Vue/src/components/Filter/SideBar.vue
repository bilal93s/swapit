<template>
    <div class="sidebar">
        <b-button v-b-toggle.sidebar-1>Recherche avancée</b-button>    
            <b-sidebar id="sidebar-1" title="Sidebar" shadow>
                <SearchFilter/>
            </b-sidebar>
    </div>
</template>

<script>
import SearchFilter from "./SearchFilter.vue";
  export default {
    components: {
    SearchFilter
    },
    // provide:() => { Igdb:{
    //     getGenres: () => {
    //         fetch("https://localhost/genres")
    //         .then(response => { return response })
    //     }

    //     getPlatform: () => {
    //         fetch("https://localhost/platforms")
    //         .then(response => { return response })
    //     }

    //     getMode: () => {
    //         fetch("https://localhost/modes")
    //         .then(response => { return response })
    //     }

    //     getCompany: () => {
    //         fetch("https://localhost/companies")
    //         .then(response => { return response })
    //     }}
    // }
}
</script>

<style scoped>
.sidebar {
    margin-top: 10px;
}
</style>