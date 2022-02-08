<template>
    <div id="app">
      <Navbar/>
      <GameCard/>
      <UserCard/>
      <router-view />
    </div> 
</template>


<script>
import Navbar from "./components/Navbar/Navbar.vue";
import GameCard from "./components/Game/GameCard.vue";
import UserCard from "./components/Game/UserCard.vue";

export default {
  name: "App",
  components: {
    Navbar,
    GameCard,
    UserCard
  }
};
</script>

<style>
</style>