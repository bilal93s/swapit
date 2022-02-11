<template>
  <div  v-if="this.$props.games" class="game_card_list">
    <div class="game_card" v-for="(game,key) in games" id="OwnList" :key="game.title+key">
      <GameCard :game="game" />
      <div v-if="!gameIsSelected(game)">
      <a @click="setToExchangeSelected(game)" title="arrow icons" class="my-icon">
        <img class="icon"
        src="../../assets/icones/add.png"
        alt="Grapefruit slice atop a pile of other slices">
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import GameCard from './Game_Card.vue';
export default {
   components: {
      GameCard,
      },
  name: "Game_To_Exchange",
  props: {
    games: {
      type: Array,
      required: true
    },
  },
  inject: ['setToExchangeSelected','gameIsSelected'],
  data() {
    return {
      showSection: false, 
      toggleIcon: "../../assets/icones/add.png",
    }
  },
  computed:{
    show(){
      console.info('show')
      console.info(this.$props.games)
      return this.$props.games.length > 0
    }
  }
};
</script>

<style scoped>

.game_card_list {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  align-items: center;
  margin: auto;
  width: 100%;
}
.icon-wrapper {
  margin: auto;
  width: 100px; 
}
.icon {
    width: 2rem;
    height: 2rem;
}
</style>