<template>
    <b-container>
        <input v-model="searchQuery" @input="resultQuery">
        <div v-if="resources">
            <Game v-for="(game,key) in resources" :key="game.id+key" :game="game"/>
        </div>
    </b-container>
</template>

<script>
import Game from "../components/Game/GameLayer.vue";

export default {
    components: {
        Game
    },
    props: {
        games: {
            type: Array,
        },
    },
    data: () => ({
        searchQuery: null,
        resources: [],
        filter: false,
    }),
    methods:{
        resultQuery() {
            console.info(this.$data.searchQuery)
            if (this.searchQuery) {
                fetch(`https://localhost/api/games.json?page=1&name=${this.searchQuery}`).then(response => response.json()).then(data => {
                console.info(data)
            this.$data.resources = data;
        }).catch(err => {
            console.error(err)
        })
        } else {
            fetch(`https://localhost/api/games.json?popular`).then(response => response.json()).then(data => {
            console.info(data)
            this.$data.resources = data;
        
        }).catch(err => {
            console.error(err)
        })          }
    },
    }
};
</script>

<style scoped>

</style>