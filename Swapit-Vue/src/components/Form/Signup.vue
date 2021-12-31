<template>
  <Formik :validator="validator" v-slot="{handleSubmit, errors, with_label}" :with_label="true">
    <label v-if="with_label"><span>Login</span></label>
    <Field name="login" type="text"> </Field>
    <small v-if="errors.login"> {{errors.login}} </small>
    <label v-if="with_label"><span> Email</span></label>
    <Field name="email" type="email"> </Field>
    <small v-if="errors.email"> {{errors.email}} </small>
    <label v-if="with_label"><span>mot de passe</span></label>
    <Field name="password" type="password"> </Field>
    <small v-if="errors.password"> {{errors.password}} </small>
    <label v-if="with_label"><span> confirmer mot de passe</span></label>
    <Field name="password_confirm" type="password"> </Field>
    <small v-if="errors.password_confirm"> {{errors.password_confirm}} </small>
    <Button :onClick='handleSubmit' type="submit" tiltle="Inscription"> </Button>
  </Formik>
</template>

<script>
  import Button from "../Buttons/Button.vue";
  import { SignupSchema as validator } from "../../lib/Validators/Signup_validator.js";
  import Formik from "../../lib/Formik.vue";
  import Field from "../../lib/Field.vue";
  export default {
    components: {
      Formik,
      Field,
      Button
    },
    computed:{
      validator:()=>validator,
    },
    name: "Register",
  };
</script>

<style scoped>
</style>