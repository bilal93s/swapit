<template>
    <div id="app">
      <Navbar/>
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


export default {
  name: "App",
  components: {
    Navbar,
    Login,
    Register,
    Toggle,
    GameSearchInput,
    GameExchange
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>