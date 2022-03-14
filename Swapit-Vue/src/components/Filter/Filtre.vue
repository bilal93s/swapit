<template>
  <div id="Filtre" class="menu-items">
    <Toggle>
      <!-- <div class="filter">
        <h1>{{title}}</h1>
        <div class="link-container" @change="updateFilter">
          <li v-for="(option,key) in resource" :key="title+key">
            <input type="checkbox" :option="option.name" v-model="checkedFilters">
            <label :class="checked(option)? ' label_checked' : 'label_unchecked'">
              <h2>
                {{option.name}}
              </h2>   
            </label>
          </li>
        </div>
      </div> -->
      <li v-for="(value,key) in resource" :key="key" active-class="active" tag="button" exact class="side-btn" :ref="`${title}-${key}`">
        <div class="link-container" @change="UpdateFilter">
          <input type="checkbox" :id="key" name="scales" :value="value.name" v-model="checkedFilters">
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
      title: {
        type: String,
        require: true
        },
      resource: Array, 
    },
    inject: ['updateFilters'],
    data: () => ({
      searchQuery: null,
      mobile: false,
      checkedFilters: [],
    }),
    methods: {
      updateFilter: function() {
        this.updateFilters(this.$data.checkedFilters, this.$props.title);
      },
      checked(option) {
        return this.checkedFilters.includes(option);
      }

    },
    
  };
</script>

<style scoped>
/* body */
/* title */
h1{
  color: #aa8e8d;
  text-align: center;
  font-size: 32px;
  font-weight: 400;
}
/* tasks */
.filter{
  width: 300px;
  height: 405px;
  position: absolute;
  top: 20%;
  left: 0px; 
  right: 0px;
  margin: 0px auto;
}
input[type=checkbox] {
  /* display: none; */
}
.label_unchecked{
  background: #ae5f75;
  height: 69px;
  width: 100%;
  display: block;
  border-bottom: 1px solid #2C3E50;
  color: #fff;
  text-transform: capitalize;
  font-weight: 900;
  font-size: 11px;
  letter-spacing: 1px;
  text-indent: 20px;
  cursor: pointer;
  transition: all 0.7s ease;
  position: relative;
  padding: 5px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}
.label_unchecked h2 {
  display: block;
  font-size: 12px;
  text-transform: capitalize;
  font-weight: normal;
  color: #fff;
}
.label_unchecked:before{
  content:"";
  width: 20px;
  height: 20px;
  background: #fff;
  display: block;
  position: absolute;
  border-radius: 100%;
  right: 20px;
  top: 30%;
  transition: border 0.7s ease
}
.label_checked{
  background: #6d335c;
  border-bottom: 1px solid #34495E;
  color: #d37b79;
}
.label_checked ~ label:before
{
  background: url("https://i.imgur.com/eoPQ05r.png") no-repeat center center;
}
</style>