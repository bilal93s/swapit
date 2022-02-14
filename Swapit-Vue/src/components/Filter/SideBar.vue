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
//  provide() {
//         return {
//         filtersSelected: this.filtersSelected,
//         UpdateFilters: this.UpdateFilters,
//         }}
}
</script>

<style scoped>
.sidebar {
    margin-top: 10px;
}
</style>