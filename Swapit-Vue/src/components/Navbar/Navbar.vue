<template>
  <b-container fluid>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">Swap'it</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-form>
            <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
            <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
          </b-nav-form>

          <b-nav-item-dropdown right>
            <!-- Using 'button-content' slot -->
            <template #button-content>
              <em>User</em>
            </template>
            <b-dropdown-item href="#">Profile</b-dropdown-item>
            <b-dropdown-item href="#">Sign Out</b-dropdown-item>
          </b-nav-item-dropdown>
          <b-navbar-nav>
            <!-- <b-nav-item href="#">Link</b-nav-item> -->
            <b-nav-item>
              <router-link to="/">Home</router-link>
            </b-nav-item>
            <b-nav-item>
              <router-link to="/signin">Connexion</router-link>
            </b-nav-item>
            <b-nav-item>
              <router-link to="/signup">Inscription</router-link>
            </b-nav-item>
            <b-nav-item>
              <router-link to="/games">Jeux</router-link>
            </b-nav-item>
          </b-navbar-nav>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </b-container>
</template>

<script>

  export default {
    name: "SearchInput",
    data: () => ({
      searchQuery: null,
      resources: [
        { id: 1, title: "javascript for dummies" },
        { id: 2, title: "vue for dummies" },
        { id: 3, title: "dos for dummies" },
        { id: 4, title: "windows for dummies" },
        { id: 5, title: "html for dummies" }
      ],
      list: [],
      filter: false,
    }),
    computed: { 
      resultQuery() {
        if (this.searchQuery) {
          return this.resources.filter(item => {
            return this.searchQuery
              .toLowerCase()
              .split(" ")
              .every(v => item.title.toLowerCase().includes(v));
          });
        } else {
          return this.resources;
        }
      }
    },   
  };
</script>

<style scoped>
  .navbar-container{
  }
</style>