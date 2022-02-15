<template>
    <div>
        <p>Liste de jeux possedés<p/>
        <GameSearchInput/>
    </div>
</template>

<script>

import GameSearchInput from "../components/Card/Game_Search_Input_ownGame.vue"

export default {
    components: {
        GameSearchInput,
    }
};
</script>

<style scoped>

</style>