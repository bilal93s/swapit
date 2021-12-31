<template>
  <component v-bind:is="as" aria-busy="" v-bind:class="shape" class="button,btn-10" v-on:click="onClick">
    <span>{{ title }}</span>
  </component>
</template>

<script>
export default {
  name: "Button",
  props: {
    title: String,
    shape: {
      type: String,
      default: "rounded",
      validator: (val) => ["squared", "rounded",].includes(val),
    },
    as: {
      type: String,
      default: "button",
      validator: (val) => ["a", "button",].includes(val),
    },
    onClick: {
      type: Function,
      require:true
    },
  },
  methods: {
    onCtrlClick: () => console.log("Alt click detected"),
  },
};
</script>

<style scoped>

.button {
  margin: 20px;
  outline: none;
}
.custom-btn {
  width: 130px;
  height: 40px;
  padding: 10px 25px;
  border: 2px solid #000;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
}

.btn-10 {
  transition: all 0.3s ease;
  overflow: hidden;
}
.btn-10:after {
  position: absolute;
  content: " ";
  top: 0;
  left: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
  transition: all 0.3s ease;
  -webkit-transform: scale(.1);
  transform: scale(.1);
}
.btn-10:hover {
  color: #fff;
}
.btn-10:hover:after {
  background: #000;
  -webkit-transform: scale(1);
  transform: scale(1);
}

</style>