<template>
  <div class="game_card">
    <img :src="game.img" class="icon" alt="icone" style="width:100%">
    <div class="container">
      <h4><b>{{game.title}}</b></h4>
      <p>{{game.description}}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Game_Card",
  props: {
    game: {
      type: Object,
      required: true
    },
  },
  data() {
    return {
      showSection: false, 
      toggleIcon: "../../assets/icones/add.png",
    }
  },
};
</script>

<style scoped>

.game-card{
  margin: auto;
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