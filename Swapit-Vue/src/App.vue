<template>
    <div id="app">
      <Navbar/>
      <!-- <Sidebar/> -->
      <!-- <GameCard/>
      <UserCard/> -->
      <router-view />
      <!-- <Toggle/> -->
      <!-- <GameExchange/> -->
    </div> 
</template>


<script>
import Navbar from "./components/Navbar/Navbar.vue";
// import Sidebar from "./components/Filter/SideBar.vue";
// import Toggle from "./components/Toggle/Toggle.vue";
// import GameExchange from "./components/Exchange/Game_Exchange.vue";

// import GameCard from "./components/Game/GameCard.vue";
// import UserCard from "./components/Game/UserCard.vue";

export default {
  name: "App",
  components: {
    Navbar,
    // Toggle,
    // GameExchange,
    // Sidebar,
    // GameCard,
    // UserCard
  }
};
</script>

<style>
#app{
  background: #E9E9E9;
}
a{
  text-decoration: none;
}
</style>