<template>
  <component v-bind:is="as" aria-busy="" class="btn btn-one" v-on:click="onClick">
    <span>{{ title }}</span>
  </component>
</template>

<script>
export default {
  name: "Button_Details",
  props: {
    title: String,
    as: {
      type: String,
      default: "button",
      validator: (val) => ["a", "button",].includes(val),
    },
    onClick: {
      type: Function,
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
  /* height: 50px; */
  text-align: center;
  /* width: 250px; */
  cursor: pointer;
  color: #FF5D19;
  transition: background-color 0.3s ease-in-out;
  position: relative;
}

.btn:hover {
  background-color: #FF5D19;
  color: #fff;
}

</style>