<template>
  <div class="">
    <main class="form-signin">
      <Formik :onSubmit="onSubmit" :validator="validator" v-slot="{handleSubmit, errors, with_label}" :with_label="true">
        <h1 class="h3 mb-3 fw-normal">Inscription</h1>

        <div class="form-floating">
          <Field class="form-control" id="floatingInput" placeholder="Nom d'utilisateur" name="login" type="text"> </Field>
          <small v-if="errors.login"> {{errors.login}} </small>
          <label v-if="with_label" for="floatingInput">Nom d'utilisateur</label>
        </div>

        <div class="form-floating">
          <Field class="form-control" id="floatingInput" placeholder="name@example.com" name="email" type="email"> </Field>
          <small v-if="errors.email"> {{errors.email}} </small>
          <label v-if="with_label" for="floatingInput">Adresse email</label>
        </div>

        <div class="form-floating">
          <Field class="form-control" id="floatingPassword" name="password" placeholder="Mot de passe" type="password"> </Field>
          <small v-if="errors.password"> {{errors.password}} </small>
          <label v-if="with_label" for="floatingPassword">Mot de passe</label>
        </div>

        <div class="form-floating">
          <Field class="form-control" id="floatingPassword" name="password_confirm" type="password"> </Field>
          <small v-if="errors.password_confirm"> {{errors.password_confirm}} </small>
          <label v-if="with_label" for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
        </div>
        <Button :onClick='handleSubmit' title="Inscription" type="submit" class="w-50 btn btn-lg btn-primary">Inscription</Button>
      </Formik>
    </main>
  </div>
</template>

<script>
  import Button from "../Buttons/Button.vue";
  import { SignupSchema as validator } from "../../lib/Validators/Signup_validator.js";
  import Formik from "../../lib/Formik.vue";
  import Field from "../../lib/Field.vue";
  import axios from 'axios'

  const instance = axios.create({
    baseURL: 'http://localhost:81/api/',
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