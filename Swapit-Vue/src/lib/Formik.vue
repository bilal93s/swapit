<template>
    <div @submit.prevent="handleSubmit" @keydown.enter.prevent="handleSubmit" class="form">
      <slot v-bind="{handleSubmit, errors, with_label}" :values="values"></slot>
    <PulseLoader :loading="isLoading" v-if="isLoading">
      
    </PulseLoader>
    </div>
</template>

<script>

import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
export default {
  name: "Formik",
  components: {
     PulseLoader
    },
  props: {
    initialValues: {Object, default: () => ({})},
    onSubmit: {
      type: Function,
      require: true,
    },
    validator: {
      type: Object,
      require: true,
    },
     with_label: {
       type: Boolean,
       default: false
      },
  },
  data: function () {  
    return {
      values: this.$props.initialValues,
      errors:[],
      isLoading: false,
      }
  },
  provide() {
    return {
      values: this.$data.values ?? [],
    }
  },
  methods: {
    handleSubmit: function () {
      this.$data.isLoading = true;
      const data = this.$data.values;
      this.$props.validator
        .validate(data, {abortEarly: false})
        .then(() => {
          this.$data.errors = {};
          this.$props.onSubmit(data); 
        }).then(() => {
            // this.$data.isLoading = false;
        })
        .catch(err => {
          this.$data.errors = {};
          if(err.inner){
            err.inner.forEach(error => {
              this.$data.errors[error.path] = error.message;
            });
          }
          // this.$data.isLoading = false;
        });
      },
  },
};
</script>

<style scoped>

.form {
  width: 50%;
  margin: auto auto;
  margin-bottom: 2rem;
  display: flex;
  align-items: center;
  justify-content: space-around;
  flex-direction: column;
}

.form > input:focus {
outline: none;
}
</style>