<template>
  <div id="SearchFilter">
    <SearchInput/>
    <Filtres :filtres_data = "filters"></Filtres>
  </div>
</template>

<script>
  import SearchInput from "./SearchInput.vue";
  import Filtres from "./Filtres.vue";
  export default {
    components: {
      SearchInput,
      Filtres,
    },
    // inject: {
    //   getIGDBGenres: () => {
    //     fetch("https://localhost/genres")
    //       .then(response => {
    //         return response;
    //       });
    //   },
    //   getIGDBPlatform: () => {
    //     fetch("https://localhost/platforms")
    //       .then(response => {
    //         return response;
    //       });
    //   },
    // },

    name: "SearchFilter",

    data: () => ({
      filters : {}
    }),
// mounted() {
//       fetch("https://localhost/genres")
//       .then(response => { this.filters =  response })
//     },
//     provide:() => {
//         getGenres: () => {
//           return this.filters;
//         }

//     }
  };
</script>

<style scoped>
</style>