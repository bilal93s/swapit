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
    name: "SearchFilter",
    data: () => ({
      filters : {}
    }),
  };
</script>

<style scoped>
</style>