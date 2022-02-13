<template>
  <div class="body-container">
    <Formik :onSubmit="onSubmit" :validator="validator" v-slot="{handleSubmit, errors, with_label}" :with_label="true">
      <Field id="email" name="email" type="email" :with_label="with_label" :error="errors.email"/>
      <label v-if="with_label"><span>Email</span></label>
      <small v-if="errors.email"> {{errors.email}} </small>
      <Field id='password' name="password" type="password" :with_label="with_label" placeholder="toto" :error="errors.password"/>
      <label v-if="with_label"><span>Mot de Passe</span></label>
      <small v-if="errors.password"> {{errors.password}} </small>
      <Field name="remenberme" type="checkbox"/>
      <label v-if="with_label"><span>Se souvenir de moi</span></label>
      <Button :onClick='handleSubmit' type="submit" title="Connexion"> </Button>
    </Formik>
  </div>
</template>

<script>

  import Button from "../Buttons/Button.vue";
  import { SigninSchema as validator } from "../../lib/Validators/Signin_validator.js";
  import Formik from "../../lib/Formik.vue";
  import Field from "../../lib/Field.vue";
  import axios from 'axios';
  export default {
    components: {
      Formik,
      Field,
      Button,
    },
    computed:{
      validator:()=>validator,
    },
    methods: {
      onSubmit:(data)=> {
        axios.get('https://localhost/api/users')
        .then(function (response) {
          console.log(data);
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
      }
    },
    name: "Signin",
  };
</script>

<style scoped>
  .body-container {
    margin-top: 30px;
  }
</style>