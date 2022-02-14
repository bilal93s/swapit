<template>
  <div id="SearchFilter">
    <Filtres :filtres_data = "filters"></Filtres>
  </div>
</template>

<script>
  // import SearchInput from "./SearchInput.vue";
  import Filtres from "./Filtres.vue";
  export default {
    components: {
      // SearchInput,
      Filtres,
    },
    name: "SearchFilter",
    data: () => ({
      filters : {}
    }),
    // provide() {
    //     return {
    //     filtersSelected: this.filtersSelected,
    //     UpdateFilters: this.UpdateFilters,
    //     }}
  };
</script>

<style scoped>
  #SearchFilter{
    background: rgba(41, 100, 124, 0.37);
  }
</style>