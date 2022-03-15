<template>
    <div>
        <div class="navbar-ctn">
            <div class="flex-logo">
                <router-link to="/">
                    <div class="logo">
                        <img src="../../assets/images/logo.svg" width="60" height="30">
                        <img src="../../assets/images/logo-text.svg" width="60" height="30">
                    </div>
                </router-link>
                <router-link to="/games" class="nav-link">Games</router-link>
            </div>
           
            <SearchInput @input="updateQuery" :enableSuggestion="!home" @actif="actifSearch = !actifSearch"/>
            
            <div class="picto-ctn">
                <router-link to="/owngameslist"><img class="picto-nav" src="../../assets/images/check.svg" width="25" height="20"></router-link>
                <router-link to="/wishgameslist"><img class="picto-nav" src="../../assets/images/heart.svg" width="20" height="20"></router-link>
                <router-link to="/subscription"><img class="picto-nav" src="../../assets/images/mail.svg" width="20" height="20"></router-link>
                <router-link to="/signin"><img class="picto-nav" src="../../assets/images/user.svg" width="20" height="20"></router-link>
                <router-link to="/signup"><img class="picto-nav" src="../../assets/images/id.png" width="35" height="35"></router-link>
                <button class="logout" @click="logout"><img class="picto-nav" src="../../assets/images/logout.svg" width="20" height="20"></button>
            </div>
        </div>
        <SideBar v-if="home && actifSearch "/>
        <div v-if="home">
            <div v-if="resources">
                <GameLayer v-for="(game,key) in resources" :key="game.id+key" :game="game"/>
            </div>
        </div>
    </div>
</template>

<script>
    import SearchInput from "./SearchInput.vue"
    import GameLayer from "../Game/GameLayer.vue";
    import SideBar from "../Filter/SideBar.vue";
    // import User from "../../lib/Services/User.js";
    export default {
        components: {
            GameLayer,
            SideBar,
            SearchInput
        },
        props: {
            home: {
                type: Boolean,
                default: true
            },
        },
    data: () => ({
        searchQuery: null,
        resources: [],
        selectedFilters: [],
        actifSearch: false,
    }),
    created() {
        if(this.$props.home){
            this.refreshRessource()
            // var user= new User();
            // var data = user.getUser(1,['id','name','email','password','created_at','updated_at','deleted_at','role_id','role'])
            // console.log(data)
            // data =user.getUser(2)
        }
    },
    methods:{
        logout() {
            localStorage.clear();
        },
        refreshRessource() {
            if (this.$data.searchQuery) {
                fetch(`https://localhost/api/games.json?page=1&name=${this.searchQuery}&${this.formatedFilters()}`)
                .then(response => response.json())
                .then(data => {
                    this.$data.resources = data;
                })
                .catch(err => {
                    console.error(err)
                })
            } else {
                console.log('toto1')
                fetch(`https://localhost/api/games.json?popular&${this.formatedFilters()}`)
                .then(response => response.json())
                .then(data => {
                    this.$data.resources = data;
                }).catch(err => {
                    console.error(err)
                })          
            }
        },
        formatedFilters() {
            var filters =''
            if (!this.checkEmptySelectedFilter()) {   
                if(!this.checkEmptySelectedFilter('genres')){
                filters = this.$data.selectedFilters.genres ? (filters != '' ? filters+"&" : filters) +`${
                    (
                        this.$data.selectedFilters.genres.map((genre, key) => `genres[${key}]=${genre}`)
                    )
                    .join('&')}` : filters
                       console.log(filters)
                }
                if(!this.checkEmptySelectedFilter('platforms')){
                filters = this.$data.selectedFilters.platforms ? (filters != '' ? filters+"&" : filters) +`${
                    (
                        this.$data.selectedFilters.platforms.map((platform, key) => `platforms[${key}]=${platform}`)
                    ).join('&')}` : filters
                       console.log(filters)
                }
                if(!this.checkEmptySelectedFilter('modes')){
                filters = this.$data.selectedFilters.modes ? (filters != '' ? filters+"&" : filters) +`${
                    (this.$data.selectedFilters.modes.map((mode, key) => `modes[${key}]=${mode}`)
                    ).join('&')}` : filters
                     console.log(filters)
                }
                console.log(filters)
            }
            console.log(filters)
            return filters
        }, 
        updateFilters(filters, categorie) {
            this.$data.selectedFilters[categorie] = filters;
            if (this.checkEmptySelectedFilter(categorie)) {
                delete  this.$data.selectedFilters[categorie]
            }
            this.refreshRessource()
            console.log(this.$data.selectedFilters)
        },
        checkEmptySelectedFilter(categorie = null) {

            if (categorie) {
                console.log(this.$data.selectedFilters?.[categorie])
                console.log(this.$data.selectedFilters?.[categorie]?.length)
                // if(this.$data.selectedFilters?.[categorie]){
                    return this.$data.selectedFilters?.[categorie]?.length === 0 
                // }
              
            } else if (!this.$data.selectedFilters) {
                return true
            }
            
        },
        updateQuery(value) {
            this.$data.searchQuery = value
            this.refreshRessource()
        }
    },
     provide() {
        return {
            updateFilters: this.updateFilters,
        }
  },
    
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
}
.picto-ctn{
    display: flex;
    justify-content: space-between;
}
.picto-nav{
    margin-left: 10px;
}

.search-input{
  background-color: rgba(41, 100, 124, 0.2);
  color: rgba(41, 100, 124);
  border-radius: 5px;
  border: none;
  width: 300px;
  height: 15px;
  padding: 5px;
}
.search-input:focus{
  outline: rgba(41, 100, 124) 2px solid;
}

</style>