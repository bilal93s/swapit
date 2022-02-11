<template>
  <div class="game_card">
    <img src="../../assets/images/acv.png" class="icon">
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

.game_card{
  margin: auto;
  display: flex;
  background-color: rgba(41, 100, 124, 0.2);
  width: 15rem;
  height: 4rem;
  overflow: hidden;
  border-radius: 1rem;
}
.icon-wrapper {
  margin: auto;
}
.icon {
    width: auto;
    height: 100%;
}
</style>