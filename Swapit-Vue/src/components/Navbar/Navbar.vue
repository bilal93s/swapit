<template>
    <div class="navbar-ctn">
        <router-link to="/">
            <div class="logo">
                <img src="../../assets/images/logo.svg" width="60" height="30">
                <img src="../../assets/images/logo-text.svg" width="60" height="30">
            </div>
        </router-link>
        <SearchInput v-model="searchQuery" @input="resultQuery" :enableSuggestion="!home"></SearchInput>
        <div class="picto-ctn">
            <router-link to="/owngameslist"><img class="picto-nav" src="../../assets/images/check.svg" width="25" height="20"></router-link>
            <router-link to="/wishgameslist"><img class="picto-nav" src="../../assets/images/heart.svg" width="20" height="20"></router-link>
            <img class="picto-nav" src="../../assets/images/mail.svg" width="25" height="25">
            <router-link to="/signin"><img class="picto-nav" src="../../assets/images/user.svg" width="25" height="25"></router-link>
            <router-link to="/signup"><img class="picto-nav" src="../../assets/images/id.png" width="35" height="35"></router-link>
            <button v-on:click="logout" class="w-50 btn btn-lg btn-primary"><img class="picto-nav" src="../../assets/images/logout.svg" width="25" height="25"></button>
        </div>
        <b-container>
        <div v-if="home">
            <div v-if="resources">
                <Game v-for="(game,key) in resources" :key="game.id+key" :game="game"/>
            </div>
        </div>
    </b-container>
    </div>
</template>

<script>
    import SearchInput from "./SearchInput.vue";
    import Game from "../Game/GameLayer.vue";
    export default {
        components: {
            SearchInput,
            Game
        },
        props: {
            query: {
                type: String,
            },
            fixed: {
                type: Boolean,
                default: false,
            },
            home: {
                type: Boolean,
                default: false,
            },
        },
        data: () => ({
            searchQuery: null,
            resources: [],
            filter: false,
        }),
        created() {
            if(this.$props.home){
                this.resultQuery()
            }
        },
        methods:{
            logout:() => {
                localStorage.clear();
            },
            resultQuery() {
            if (this.searchQuery) {
                fetch(`https://localhost/api/games.json?page=1&name=${this.searchQuery}`).then(response => response.json()).then(data => {
                this.$data.resources = data;
                
                }).catch(err => {
                    console.error(err)
                })
            } else {
                fetch(`https://localhost/api/games.json?popular`).then(response => response.json()).then(data => {
                this.$data.resources = data;
            
                }).catch(err => {
                    console.error(err)
                })          
            }
        },
    }
    
    }
</script>

<style>
.navbar-ctn{
    display: flex;
    height: auto;
    background-color: white;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    flex-wrap: wrap;
}
.picto-ctn{
    display: flex;
    justify-content: space-between;
}
.picto-nav{
    margin-left: 10px;
}

</style>