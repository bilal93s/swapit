<template>
  <div class="game_card">
    <img src="../../assets/images/acv.png" class="icon">
    <div class="container">
      <div>{{game.name}}</div>
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
  flex-direction: column;
  background-color: rgba(41, 100, 124, 0.2);
  width: 8rem;
  height: 18rem;
  overflow: hidden;
  border-radius: 1rem;
}
.icon-wrapper {
  margin: auto;
}
.icon {
    width: 100%;
    height: auto
}
</style>