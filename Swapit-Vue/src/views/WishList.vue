<template>
    <div>
        <p>Liste de jeux souhaités<p/>
        <GameSearchInput/>
    </div>
</template>

<script>

import GameSearchInput from "../components/Card/Game_Search_Input.vue"

export default {
    components: {
        GameSearchInput,
    }
};
</script>

<style scoped>

</style>