<template>
  <component v-bind:is="as" aria-busy="" class="btn btn-one" v-on:click="onClick">
    <span>{{ title }}</span>
  </component>
</template>

<script>
export default {
  name: "Button",
  props: {
    title: String,
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

.btn {
  /* line-height: 50px; */
  height: 50px;
  text-align: center;
  width: 250px;
  cursor: pointer;
  color: #FF5D19;
  transition: all 0.3s;
  position: relative;
}
.btn span {
  transition: all 0.3s;
}
.btn::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0;
  transition: all 0.3s;
  border-top-width: 1px;
  border-bottom-width: 1px;
  border-top-style: solid;
  border-bottom-style: solid;
  border-top-color: rgba(216, 50, 50, 0.5);
  border-bottom-color: rgba(199, 71, 71, 0.5);
  transform: scale(0.1, 1);
}
.btn:hover span {
  letter-spacing: 2px;
}
.btn:hover::before {
  opacity: 1; 
  transform: scale(1, 1); 
}
.btn::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  transition: all 0.3s;
  background-color:white;
  opacity: 0.5;
}
.btn:hover::after {
  opacity: 0; 
  transform: scale(0.1, 1);
}
</style>