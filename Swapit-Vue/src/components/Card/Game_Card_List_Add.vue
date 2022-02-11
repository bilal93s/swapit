<template>
  <div class="game_card_list" v-if="games">
    <div class="" v-for="(game,key) in games" id="OwnList" :key="key">
      <GameCard :game="game" />
      <a v-if="!added(game.id)" @click="add(game)" title="arrow icons" class="my-icon">
        <img class="icon"
        src="../../assets/icones/add.png"
        alt="Grapefruit slice atop a pile of other slices">
        </a>
    </div>
  </div>
</template>

<script>
import GameCard from './Game_Card.vue';
export default {
   components: {
      GameCard,
      },
  name: "Game_Card_List_Add",
  props: {
    games: {
      type: Object,
    },
  },
  inject: ['add', 'added'],
  data() {
    return {
      showSection: false, 
      toggleIcon: "../../assets/icones/add.png",
    }
  },
};
</script>

<style scoped>

.game_card_list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
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