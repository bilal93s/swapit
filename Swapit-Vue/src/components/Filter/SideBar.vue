<template>
    <div class="sidebar">
        <div class="title">
            Simple Sidebar
        </div>
          <SearchFilter/>
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
.title {
    color: white;
    font-size: 24px;
    margin-top: 10px;
}
</style>