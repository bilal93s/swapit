<template>
  <div id="Game_Search_Input">
    <input v-model="searchQuery">
    <GameCardListAdd v-show="searchQuery" :games="resultQuery"/>
    <GameCardListOwn v-show="my_games" :games="my_games"/>
  </div>
</template>

<script>
  import GameCardListAdd from './Game_Card_List_Add.vue';
  import GameCardListOwn from './Game_Card_List_Own.vue';

  export default {
      name: "Game_Search_Input",
      components: {
      GameCardListAdd,
      GameCardListOwn
      },
      data: () => ({
        searchQuery: null,
        resources: [
          { id: 1, title: "NBA 2k",description:'test1', img:"" },
          { id: 2, title: "Rocket League",description:'test2', img:""  },
          { id: 3, title: "God Of War",description:'test3', img:""  },
          { id: 4, title: "FIFA 21",description:'test4', img:""  },
          { id: 5, title: "GTA", description:'test5', img:""  }
        ],
        my_games: [],
        filter: false,
      }),
      computed: { 
        resultQuery() {
          if (this.searchQuery) {
            return this.resources.filter(item => {
              return this.searchQuery
                .toLowerCase()
                .split(" ")
                .every(v => item.title.toLowerCase().includes(v));
            });
          } else {
            return this.resources;
          }
        },
        // addedGames() {
        //   return this.games.map(game => {if(this.added(game_id)){
        //     return game
        //   }});
        // }
      },
      methods:{
        add: function(game) {
          if (!this.added(game)) {
            this.$data.my_games.push(game)
            console.info(this.$data.my_games)
          }
        },
        supp: function(game) {
          if (this.added(game.id)) {
            this.$data.my_games = this.$data.my_games.filter(e => e.id !== game.id)
            console.info(this.$data.my_games)
          }
        },
        added: function(game_id) {
          console.info(this.$data.my_games)
          return (this.$data.my_games.map(game => {
            return game.id
          })).includes(game_id)
        
        }
      },
      provide() {
        return {
        my_games: this.$data.my_games ?? [],
        add: this.add,
        supp: this.supp,
        added: this.added,
        }
      }, 
    };
</script>

<style scoped>
</style>