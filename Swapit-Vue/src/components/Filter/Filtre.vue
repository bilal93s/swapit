<template>
  <div id="Filtre" class="menu-items">
    <slot>
      <h1>{{title}}</h1>
    </slot>
    <Toggle>
      <li v-for="(value,key) in resource" :key="key" active-class="active" tag="button" exact class="side-btn">
        <div class="link-container" @change="UpdateFilter">
          <input type="checkbox" :id="key" name="scales" :value="value.name" checked="false">
          <label for="scales" class ="filter_value">{{value.name}}</label>
        </div>
      </li>
     </Toggle>
  </div>
</template>

<script>
  import Toggle from "../Toggle/Toggle.vue";

  export default {
    name: "Filtre",
      components: {
      Toggle,
    },
    props:{
      title: String,
      resource: Array,
      
    },
    inject: ['UpdateFilters','filtersSelected'],
    data: () => ({
      searchQuery: null,
      mobile: false,
      // UpdateFilters: this.UpdateFilters,
      // filtersSelected: this.filtersSelected,
    }),
    methods: {
      UpdateFilter: function(e) {
        var filters = this.filtersSelected
              console.log(this.$props.title)
                console.log(this.filtersSelected)
                this.UpdateFilters(filters);
              console.log(this.filtersSelected)
       if(!filters?.[this.$props.title]){
          filters.push = [this.$props.title] [[e.target.value]]
        } else if(filters?.[this.$props.title].includes(e.target.value)) {
                  console.log('test1')

                  console.log(e.target.checked)

         filters[this.$props.title].splice(filters[this.$props.title].indexOf(e.target.value), 1);
        } else {
                  console.log(e.target.checked)

          filters[this.$props.title].push(e.target.value);
        }
              console.log('test3')
        this.UpdateFilters(filters);
      }
    },
    
  };
</script>

<style scoped>
.title {
    color: white;
    font-size: 24px;
    margin-top: 10px;
}

.filter_value {
    color: black;
    font-size: 10px;
    margin-top: 5px;
}

.menu-items {
    display: flex;
    flex-direction: column;
    margin-top: 40px;
    margin-left: 6px;
}

.menu-items > * {
    margin-top: 60px;
}

.side-btn {
    border: none;
    padding: 16px 0px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    color: white;
    background-color: transparent;
}

.side-btn:focus {
    outline: none;
}

.side-btn.active {
    position: relative;
    background-color: white;
    color: teal;
    font-weight: 600;
    margin-left: 10px;
    border-radius: 30px 0 0 30px;
}

.side-btn.active::before {
    top: -30px;
}

.side-btn.active::after {
    bottom: -30px;
}

.side-btn.active::before, .side-btn.active::after {
    position: absolute;
    content: "";
    right: 0;
    height: 30px;
    width: 30px;
    background-color: white;
}

.side-btn.active .link-container::before {
    top: -60px;
}

.side-btn.active .link-container::after {
    bottom: -60px;
    z-index: 99;
}

.side-btn.active .link-container::before, .side-btn.active .link-container::after {
    position: absolute;
    content: "";
    right: 0px;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    background-color: teal;
}
</style>