<template>
  <div id="Game_Exchange" class="gameExchange">
    <GamesToExchange  :games="gamesToExchange"/>
    <GamesWishExchange  :games="gamesWish"/>
    <GameCardExchange v-if="gameWishSelected || gameToExchangeSelected" :gameToExchange="gameToExchangeSelected" :gameWish="gameWishSelected"/>
    <Button title="Confirmer" :onClick="HandleSubmit" />
  </div>
</template>

<script>
  import GamesToExchange from './Game_To_Exchange.vue';
  import GamesWishExchange from './Game_Wish_Exchange.vue';
  import GameCardExchange from './Game_Card_Exchange.vue';
  import Button from '../Buttons/Button.vue';


  export default {
      name: "Game_Exchange",
      components: {
      GamesToExchange,
      GamesWishExchange,
      GameCardExchange,
      Button,
      },
      data: () => ({
        searchQuery: null,
        gameToExchangeSelected: null,
        gameWishSelected: null,
      }),
      computed: { 
        gamesToExchange() {
          console.info( [
            { id: 1, title: "NBA 2k",description:'test1', img:"" },
            { id: 2, title: "Rocket League",description:'test2', img:""  },
            { id: 3, title: "God Of War",description:'test3', img:""  },
            { id: 4, title: "FIFA 21",description:'test4', img:""  },
            { id: 5, title: "GTA", description:'test5', img:""  }
          ]);
          return [
            { id: 1, title: "NBA 2k",description:'test1', img:"" },
            { id: 2, title: "Rocket League",description:'test2', img:""  },
            { id: 3, title: "God Of War",description:'test3', img:""  },
            { id: 4, title: "FIFA 21",description:'test4', img:""  },
            { id: 5, title: "GTA", description:'test5', img:""  }
          ]
        },
        gamesOwn() {
          return [
            { id: 8, title: "CyberPunk 2077",description:'test1', img:"" },
            { id: 10, title: "Gear of War", description:'test2', img:""  },
            { id: 13, title: "Call of War: Cold War", description:'test2', img:"" },
          ]
        },
        gamesWish() {
          return [
            { id: 8, title: "CyberPunk 2077",description:'test1', img:"" },
            { id: 10, title: "Gear of War", description:'test2', img:""  },
            { id: 9, title: "Super Mario Deluxe",description:'test1', img:"" },
          ]
        }
      },
      methods:{
        setToExchangeSelected: function(game) {
            this.$data.gameToExchangeSelected = game ?? null;
        },
        setWishSelected: function(game) {
            console.log('now wish selected');
            this.$data.gameWishSelected = game ?? null; 
        },
        resetToExchangeSelected: function() {
          this.$data.gameToExchangeSelected = null 
        },
        resetWishSelected: function() {
          this.$data.gameWishSelected = null 
        },
        addOwn: function(game) {
          // if (!this.gameOwn(game)) {
          //   this.$data.my_games.push(game)
          // }
          console.log('now owned')
          this.$data.gameWishSelected = game
        },
        gameOwn: function(game_id) {
          return (this.gamesOwn.map(game => {
            return game.id
          })).includes(game_id)
        },
        gameIsSelected: function(game) {
          return (this.gameToExchangeSelected && this.gameToExchangeSelected.id == game.id) || (this.gameWishSelected && this.gameWishSelected.id == game.id)
        },
        HandleSubmit: function() {
          // this.$emit('submit', this.my_games)
          console.info(this.$data.gameToExchangeSelected);
          console.info(this.$data.gameWishSelected);

        },
      },
      provide() {
        return {
        gameToExchangeSelected : this.$data.gameToExchangeSelected,
        gameWishSelected : this.$data.gameWishSelected,
        setToExchangeSelected: this.setToExchangeSelected,
        setWishSelected: this.setWishSelected,
        resetWishSelected: this.resetWishSelected,
        resetToExchangeSelected: this.resetToExchangeSelected,
        gameIsSelected: this.gameIsSelected,
        gameOwn: this.gameOwn,
        addOwn: this.addOwn,
        }
      }, 
    };
</script>

<style scoped>
.gameExchange {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: flex-start;
  align-content: flex-start;
  width: 100%;
  height: 100%;
  padding: 2rem;
}
</style>