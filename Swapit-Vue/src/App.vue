<template>
    <div id="app">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&display=swap" rel="stylesheet">
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
body{
  font-family: 'Montserrat Alternates', sans-serif !important; 
}
</style>