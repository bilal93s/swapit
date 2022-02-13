<template>
  <div class="body-container">
    <Formik :onSubmit="onSubmit" :validator="validator" v-slot="{handleSubmit, errors, with_label}" :with_label="true">
      <label v-if="with_label"><span>Username</span></label>
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
  </div>
</template>

<script>
  import Button from "../Buttons/Button.vue";
  import { SignupSchema as validator } from "../../lib/Validators/Signup_validator.js";
  import Formik from "../../lib/Formik.vue";
  import Field from "../../lib/Field.vue";
  import axios from 'axios'

  const instance = axios.create({
    baseURL: 'https://localhost/api/',
    timeout: 1000,
    headers: {
      'accept': 'application/ld+json',
      'Content-Type' : 'application/ld+json'
    }
  })

  export default {
    components: {
      Formik,
      Field,
      Button
    },
    computed:{
      validator:()=>validator,
    },
    methods: {
      onSubmit:(data)=> {
        instance.post('/users', {
          username: data.login,
          email: data.email,
          roles: ["ROLE_USER"],
          password: data.password
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
      }
    },
    name: "Register",
  };
</script>

<style scoped>
</style>