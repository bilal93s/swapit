<template>
  <div id="app">
    <!-- <img alt="Vue logo" src="./assets/logo.png" /> -->
    <!-- <Aretha /> -->
    <!-- <ToggleButton />
    <Button title="Click Me" v-bind:onClick="handleClick" />
    <Button title="Alert" variant="rounded" :onClick="handleAlert" />
    <Button title="Foo" variant="text" :onClick="handleClick" />
    <Collapsable
      title="Foo 1"
      description="Kung foo fighting 1"
      defaultBehavior="opened"
    />
    <Collapsable
      title="Foo 2"
      description="Kung foo fighting 2"
      defaultBehavior="closed"
    />
    <Collapsable title="Foo 3" description="Kung foo fighting 3" />
    <List
      :data="[
        { id: 1, name: 'Foo' },
        { id: 2, name: 'Bar' },
      ]"
    />
    <Form />
    <TPDirective /> -->
    <div class="dashboard">
         <SideBar/>
        <!-- <div class="content">
            <router-view/>
        </div> -->
        
    </div>
    <Toggle>
    <Login/>
    </Toggle>
    <Register/>
    <GameSearchInput/>
  </div>
</template>

<script>
// import Aretha from "./components/Aretha.vue";
// import ToggleButton from "./components/ToggleButton.vue";
// import Button from "./components/Button.vue";
// import Collapsable from "./components/Collapsable.vue";
// import List from "./components/List.vue";
// import Form from "./components/Form.vue";
// import TPDirective from "./components/TPDirective.vue";
import SideBar from "./components/Filter/SideBar.vue";
import Login from "./components/Form/Signin.vue";
import Register from "./components/Form/Signup.vue";
import Toggle from "./components/Toggle/Toggle.vue";
import GameSearchInput from "./components/Card/Game_Search_Input.vue"


export default {
  name: "App",
  components: {
    // Aretha,
    // ToggleButton,
    // Button,
    // Collapsable,
    // List,
    // Form,
    // TPDirective,
    SideBar,
    Login,
    Register,
    Toggle,
    GameSearchInput
  },
  methods: {
    handleClick: function () {
      console.log("click me");
    },
    handleAlert: function () {
      alert("Alertttt");
    },
  },
};
</script>

<style>
/* #app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
} */
.dashboard {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
    display: grid;
    grid-template-columns: 1fr 5fr;
    background-color: teal;
    height: auto;
    width: 100vw;
}

.content {
    background-color: white;
    border-radius: 10px;
    margin: 6px 6px 6px 0px;
}
</style>