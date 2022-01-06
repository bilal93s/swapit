<template>
  <component v-bind:is="as" :name="name" :value="value" v-model="value" @input="handleChange" :id="name">
      <slot></slot>
  </component>
</template>

<script>
import Input from "../components/Inputs/Input.vue" 
export default {
  components:{
    Input
    },
  name: "Field",
  props: {
    name: {
        type: String,
        required: true,
    },
    as: {
        type: String,
        default: "input",
    },  
    error:{
      type: String,
      default:'',
    },
  },
    inject: ['values'],
    computed: {
      value: {
        get() {
            return this.values?.[this.name] ?? '';
        },
        set(value) {
          this.values[this.name] = value;
          // this.$emit('input', value);
        },
      },
    },
    methods: {
      handleChange: function (event) {
        this.value = event.target.value;
      },
    },
  };
</script>

<style scoped>
</style>