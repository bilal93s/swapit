<template>
  <div id="SearchInput">
    <input class="search-input" v-model="searchQuery">
    <div v-show ="searchQuery" v-for="game in resultQuery" :key="game.id">{{game.title}}</div>
  </div>
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

<style>
.search-input{
  background-color: rgba(41, 100, 124, 0.2);
  color: rgba(41, 100, 124);
  border-radius: 5px;
  border: none;
  width: 300px;
  height: 15px;
  padding: 5px;
}
.search-input:focus{
  outline: rgba(41, 100, 124) 2px solid;
}
</style>