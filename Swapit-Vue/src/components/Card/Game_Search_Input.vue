<template>
  <div id="Game_Search" class="gameSearch">
    <input v-model="searchQuery">
    <GameCardListAdd v-show="searchQuery" :games="resultQuery"/>
    <GameCardListOwn v-show="my_games" :games="my_games"/>
    <Button title="Confirmer" :onClick="HandleSubmit" />
  </div>
</template>

<script>
  import GameCardListAdd from './Game_Card_List_Add.vue';
  import GameCardListOwn from './Game_Card_List.vue';
  import Button from '../Buttons/Button.vue';

  export default {
      name: "Game_Search_Input",
      components: {
      GameCardListAdd,
      GameCardListOwn,
      Button,
      },
      props: {
         onSubmit: {
          type: Function,
          require: true,
        },
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
      },
      methods:{
        add: function(game) {
          if (!this.added(game)) {
            this.$data.my_games.push(game)
          }
        },
        supp: function(game) {
          if (this.added(game.id)) {
            this.$data.my_games = this.$data.my_games.filter(e => e.id !== game.id)
          }
        },
        added: function(game_id) {
          return (this.$data.my_games.map(game => {
            return game.id
          })).includes(game_id)
        },
        HandleSubmit: function() {
          // this.$emit('submit', this.my_games)
          console.info(this.$data.my_games)
        },
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
.gameSearch{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  background-color: #fafafa;
  padding: 2rem;
}
</style>