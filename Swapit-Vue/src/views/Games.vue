<template>
    <b-container>
        <GameLayer/>
        <GameCard/>
        <UserCard/>
    </b-container>
</template>

<script>
import GameCard from "../components/Card/Game_Card.vue";
import GameLayer from "../components/Game/GameLayer.vue";
import UserCard from "../components/Game/UserCard.vue";

export default {
    components: {
        GameCard,
        GameLayer,
        UserCard,
    }
};
</script>

<style scoped>

</style>