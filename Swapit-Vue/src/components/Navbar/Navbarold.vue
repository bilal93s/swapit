<template>
    <div class="navbar-ctn">
        <div class="logo">
            <img src="../../assets/images/logo.svg" width="60" height="30">
            <img src="../../assets/images/logo-text.svg" width="60" height="30">
        </div>
     <div id="SearchInput">
        <input class="search-input" v-model="searchQuery" @input="refreshRessource">
        <div v-if="!home">
            <div v-show ="searchQuery" v-for="(game,key) in resources" :key="game.name+key">
                {{game.name}}
            </div>
        </div>
    </div>
    <SideBar v-if="home"/>
    <div class="picto-ctn">
        <img class="picto-nav" src="../../assets/images/check.svg" width="25" height="20">
        <img class="picto-nav" src="../../assets/images/heart.svg" width="20" height="20">
        <img class="picto-nav" src="../../assets/images/mail.svg" width="20" height="20">
        <router-link to="/signin"><img class="picto-nav" src="../../assets/images/user.svg" width="20" height="20"></router-link>
        <router-link to="/signup">Inscription</router-link>
    </div>
    <b-container>
        <div v-if="home">
            <div v-if="resources">
                        <GameLayer v-for="(game,key) in resources" :key="game.id+key" :game="game"/>
            </div>
        </div>
    </b-container>
    </div>
</template>

<script>
    // import SearchInput from "./SearchInput.vue";
    import GameLayer from "../Game/GameLayer.vue";
    import SideBar from "../Filter/SideBar.vue";
    // import SearchFilter from "../Filter/SearchFilter.vue";
    export default {
        components: {
            // SearchFilter,
            GameLayer,
            SideBar
        },
        props: {
            home: {
                type: Boolean,
            },
        },
    data: () => ({
        searchQuery: null,
        resources: [],
        updater: null,
         filtersSelected: 'toto',
    }),
    created() {
        if(this.$props.home){
            this.refreshRessource()
        }
    },
    methods:{
         refreshRessource() {
          if (this.$data.searchQuery) {
              console.log('toto')


             fetch(`https://localhost/api/games.json?page=1&name=${this.searchQuery}`).then(response => response.json()).then(data => {
            this.$data.resources = data;
            
            }).catch(err => {
                console.error(err)
            })
        } else {
             console.log('toto1')
            fetch(`https://localhost/api/games.json?popular`).then(response => response.json()).then(data => {
            this.$data.resources = data;
        
            }).catch(err => {
                console.error(err)
            })          
        }
      },
        UpdateFilters(filters) {
            this.$data.filtersSelected = filters;
            console.log(this.$data.filtersSelected)
      },
    },
     provide() {
        return {
        UpdateFilters: this.UpdateFilters,
        filtersSelected: this.filtersSelected,
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