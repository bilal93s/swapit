<template>
  <div class="game_card_list">
    <div class="game_card" v-for="(game,key) in games" id="OwnList" :key="key">
      <GameCard :game="game" />
      <a v-if="added(game.id)" @click="supp(game)" title="arrow icons" class="my-icon">
        <img class="icon"
        src="../../assets/icones/delete.png"
        alt="Grapefruit slice atop a pile of other slices">
        </a>
    </div>
  </div>
</template>

<script>
import GameCard from './Game_Card.vue';
export default {
  name: "Game_Card_List_Own",
   components: {
      GameCard,
      },
  props: {
    games: {
      type: Array,
      required: true,
    },
  },
  inject: ['supp', 'my_games', 'added'],
  data() {
    return {
      sortBy: 'title',
      sortDirection: 'asc',
    }
  },
  methods: {
    sortMode: function(s) {
        if(s === this.sortBy) {
            this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
        }
      this.sortBy = s;
    }
  },
  watch: {
    sortedGames() {
      console.info(this.$data.games)
        if (this.$data.games?.length > 0) {
          console.info('there')
          this.$data.games.slice().sort(function(a, b){
            return (a[this.$data.sortBy] > b[this.$data.sortBy]) ? 1 : -1;
          });
          console.info("DATA"+this.$data.games)
          return this.$data.games;
        } else {
         console.info('there')
         return []
        }
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