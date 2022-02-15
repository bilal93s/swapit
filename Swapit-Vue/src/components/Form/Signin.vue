<template>
  <div class="">
    <main class="form-signin">
      <Formik :onSubmit="onSubmit" :validator="validator" v-slot="{handleSubmit, errors, with_label}" :with_label="true">
        <h1 class="h3 mb-3 fw-normal">Connexion</h1>

        <div class="form-floating">
          <Field type="email" class="form-control" id="floatingInput email" placeholder="name@example.com" name="email" :with_label="with_label" :error="errors.email"/>
          <small v-if="errors.email"> {{errors.email}} </small>
          <label for="floatingInput">Adresse email</label>
        </div>
        <div class="form-floating">
          <Field class="form-control" id='password floatingPassword' name="password" type="password" :with_label="with_label" placeholder="toto" :error="errors.password"/>
          <label for="floatingPassword">Mot de passe</label>
        </div>
        
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
        </div>
        <Button :onClick='handleSubmit' title="Connexion" type="submit" class="w-50 btn btn-lg btn-primary">Connexion</Button>
      </Formik>
    </main>
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
    // data: function () {  
    //   return {
    //     connexion_failed: false
    //   }
    // },
    computed:{
      validator:()=>validator,
    },
    methods: {
      onSubmit:(data) => {
        axios.get('http://localhost:81/users')
        .then(function (response) {
          console.log(data.email);
          for (var i=0; i<=response.data['hydra:member'].length ; i++) {
            if(data.email == response.data['hydra:member'][i]['email'] && data.password == response.data['hydra:member'][i]['password']){
              localStorage.setItem('username', response.data['hydra:member'][i]['username']);
              localStorage.setItem('id', response.data['hydra:member'][i]['id']);
              this.$router.push('/games');
            }
            else{
              // this.$data.connexion_failed = true
            }
          }
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
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }
  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>