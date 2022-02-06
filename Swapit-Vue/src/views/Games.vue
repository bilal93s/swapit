<template>
    <b-container>
        <Sidebar/>
        <GameCard/>
    </b-container>
</template>

<script>
import Sidebar from "../components/Filter/SideBar.vue";
import GameCard from "../components/Card/Game_Card.vue";

export default {
    components: {
        Sidebar,
        GameCard
    }
};
</script>

<style scoped>

</style>