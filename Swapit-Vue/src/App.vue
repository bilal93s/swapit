<template>
    <div id="app">
      <Navbar/>
      <GameCard/>
      <UserCard/>
      <router-view />
      <Toggle>
      <Login/>
      </Toggle>
      <Register/>
      <GameSearchInput/>
      <GameExchange/>
    </div> 
</template>


<script>
import Navbar from "./components/Navbar/Navbar.vue";
import Login from "./components/Form/Signin.vue";
import Register from "./components/Form/Signup.vue";
import Toggle from "./components/Toggle/Toggle.vue";
import GameSearchInput from "./components/Card/Game_Search_Input.vue"
import GameExchange from "./components/Exchange/Game_Exchange.vue";

import GameCard from "./components/Game/GameCard.vue";
import UserCard from "./components/Game/UserCard.vue";

export default {
  name: "App",
  components: {
    Navbar,
    Login,
    Register,
    Toggle,
    GameSearchInput,
    GameExchange,
    GameCard,
    UserCard
  }
};
</script>

<style>
</style>