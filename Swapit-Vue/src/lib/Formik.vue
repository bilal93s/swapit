<template>
    <div @submit.prevent="handleSubmit" @keydown.enter.prevent="handleSubmit" class="form">
      <slot v-bind="{handleSubmit, errors, with_label}" :values="values" @onChange.prevent="updateValues" ></slot>
    </div>
</template>

<script>
export default {
  name: "Formik",
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
      }
  },
  provide() {
    return {
      values: this.$data.values ?? [],
      // updateValues: updateValues,
    }
  },
  methods: {
    updateValues: function (values) {
        this.$data.values = values
    },
    handleSubmit: function () {
      const data = this.$data.values;
      console.log(this.$data.values);
      this.$props.validator
        .validate(data, {abortEarly: false})
        .then(() => {
          this.$data.errors = {};
          this.$props.onSubmit(data); 
        })
        .catch(err => {
          this.$data.errors = {};
          if(err.inner){
            err.inner.forEach(error => {
              this.$data.errors[error.path] = error.message;
              console.info(error.message);
                            console.info(error.path);
                            console.info(this.$data.errors)

            
            });
          }
        });
      },
  },
};
</script>

<style scoped>

.form {
  width: 50%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-around;
  flex-direction: column;
}
</style>