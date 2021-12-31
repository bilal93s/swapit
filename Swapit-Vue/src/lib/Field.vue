<template>
  <component v-bind:is="as" :name="name" :value="value" v-model="value" @keyup="handleChange" :id="name">
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
          this.values[this.name]=value;
                  // this.values[this.name]=event.target.value
          console.info(this.values)
          this.$emit('onChange', this.values);
        },
      },
    },
    methods: {
      handleChange: function (event) {
        console.info(this.values)
        this.value = event.target.value;
      },
    },
  };
</script>

<style scoped>
</style>