<template>
  <div id="Game_Search" class="gameSearch">
    <input v-model="searchQuery" @input="resultQuery">
    <GameCardListAdd v-show="searchQuery" :games="resources"/>
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
        resources: {},
        my_games: [],
        filter: false,
      }),
      computed: { 
      
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
        resultQuery() {
          console.info(this.$data.searchQuery)
          if (this.searchQuery) {
            fetch(`https://localhost/api/games?name=${this.searchQuery}`).then(data => {
              console.info( data)
            this.$data.resources = data['hydra:member']
            
          }).catch(err => {
            console.error(err)
          })
          }
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