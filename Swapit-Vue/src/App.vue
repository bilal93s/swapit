<template>
    <div id="app">
      <Navbar/>
      <Sidebar/>
      <router-view />
      <Toggle/>
      <GameExchange/>
    </div> 
</template>


<script>
import Navbar from "./components/Navbar/Navbar.vue";
import Sidebar from "./components/Filter/SideBar.vue";
import Toggle from "./components/Toggle/Toggle.vue";
import GameExchange from "./components/Exchange/Game_Exchange.vue";

export default {
  name: "App",
  components: {
    Navbar,
    Toggle,
    GameExchange,
    Sidebar,
  }
};
</script>

<style>
#app{
  background: #E9E9E9;
}
</style>