<template>
    <div class="search" :class="[{ active: isActive }]">
      <div class="search-wrapper" :class="[{ active: isActive }]">
        <div class="input-holder">
            <input type="text" class="search-input" placeholder="Type to search" v-model="searchQuery" @input="handleChange" />
            <button class="search-icon" @click="updateActiveState"><span></span></button>
        </div>
        <span class="close" @click= "updateActiveState"></span>
      </div>
      <div v-if="enableSuggestion">
        <div v-show ="searchQuery" v-for="(game,key) in resultQuery" :key="game.name+key">
          {{game.name}}
        </div>
      </div>
    </div>
</template>

<script>

  export default {
    name: "SearchInput",
    props: {
      enableSuggestion: {
        type: Boolean,
        default: false,
      },
    },
    data: () => ({
      searchQuery: null,
      resources: [],
      isActive: false
    }),
    methods: {
      refreshRessource() {
        if (this.$data.searchQuery) {
          fetch(`https://localhost/api/games.json?properties%5B%5D=name&name=${this.searchQuery}`).then(response => response.json()).then(data => {
            console.log(this.$data.searchQuery)
            console.info(data)
            this.$data.resources = data;
          }).catch(err => {
            console.error(err)
          })
        } 
      },
      ressourceFormater(resources) {
        if(resources.length >10) {
            return resources.slice(0,10)
          } else {
            return resources
          }
      },
      handleChange(){
        this.$emit('input', this.$data.searchQuery)
      },
      updateActiveState() {
        this.$data.isActive = !this.$data.isActive;
        console.log(this.$data.isActive)
        this.$emit('actif', this.$data.isActive);
      },
    },
    computed: { 
      resultQuery() {
        if (this.$data.searchQuery && this.$data.resources) {
          var resources = this.ressourceFormater(this.$data.resources)
          // console.log('resultQuery')
          // console.info(resources.filter(item => {
          //   return this.searchQuery
          //     .toLowerCase()
          //     .split(" ")
          //     .every(v => item.name.toLowerCase().includes(v.toLowerCase()));
          // }))
          return resources.filter(item => {
            return this.searchQuery
              .toLowerCase()
              .split(" ")
              .every(v => item.name.toLowerCase().includes(v));
          });
          
        } else {
          return []
        }
      }
    },   
  };
</script>

<style>
.search{
  display: flex;
  margin: auto;
  width:100%;
  height:100%;
}
/* 
.search{
  display: flex;
  width:4rem;
  height:4rem;
} */
.search-wrapper {
    height: auto;
    position: relative;
     /* justify-content: space-between; */
     justify-content: center;
     display: flex;
    /* top:50%; */
    /* left:50%; */
    /* margin-top: 20px ; */
    margin: auto;
    transition: all 0.3s ease-in-out;

}
.search-wrapper.active {
  /* transform: translateX(-50%); */
  /* left:50%; */
  transition: all 0.3s ease-in-out;
  /* margin-top: 20px ; */
}
.search-wrapper .input-holder {  
    margin: auto; 
    height: 4rem;
    width:4rem;
    overflow: hidden;
    background: rgba(255,255,255,0);
    border-radius:6px;
    position: relative;
    transition: all 0.3s ease-in-out;
}
.search-wrapper.active .input-holder {
    width:28.125rem;
    border-radius: 50px;
    background: rgba(0,0,0,0.5);
    transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
}
.search-wrapper .input-holder .search-input {
    width:100%;
    height: 50px;
    padding:0px 70px 0 20px;
    opacity: 0;
    position: absolute;
    top:0px;
    left:0px;
    background: transparent;
    box-sizing: border-box;
    border:none;
    outline:none;
    font-family:"Open Sans", Arial, Verdana;
    font-size: 16px;
    font-weight: 400;
    line-height: 20px;
    color:#FFF;
    /* transform: translate(0, 60px); */
    transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
    transition-delay: 0.3s;
}
.search-wrapper.active .input-holder .search-input {
    opacity: 1;
    /* transform: translate(0, 10px); */
}
.search-wrapper .input-holder .search-icon {
    
    border:none;
    border-radius:6px;
    background: #FFF;
    padding:0px;
    outline:none;
    position: relative;
    z-index: 2;
    float:right;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}
.search-wrapper.active .input-holder .search-icon {
    width:2.5rem;
    height:2.5rem;
    margin: 10px;
    border-radius: 30px;
}
.search-wrapper .input-holder .search-icon span {
    width:22px;
    height:22px;
    display: inline-block;
    vertical-align: middle;
    top: 1.5rem;
    position:relative;
    transform: rotate(45deg);
    transition: all .4s cubic-bezier(0.650, -0.600, 0.240, 1.650);
}
.search-wrapper.active .input-holder .search-icon span {
    top: 0;
    transform: rotate(-45deg);
}
.search-wrapper .input-holder .search-icon span::before, .search-wrapper .input-holder .search-icon span::after {
    position: absolute; 
    content:'';
}
.search-wrapper .input-holder .search-icon span::before {
    width: 0.25rem;
    height: 0.688rem;
    left: 0.563rem;
    top: 1.125rem;
    border-radius: 0.125rem;
    background: #FE5F55;
}
.search-wrapper .input-holder .search-icon span::after {
    width: 1rem;
    height: 1rem;
    left: 0px;
    top: 0px;
    border-radius: 16px;
    border: 4px solid #FE5F55;
}
.search-wrapper .close {
    position: absolute;
    /* z-index: 1; */
    /* top:24px; */
    /* transform:  */
    top: 1rem;
    opacity: 0;
    margin:auto auto;
    right:1rem;
    width:1.5rem;
    height:1.5rem;
    cursor: pointer;
    transform: rotate(-180deg);
    transform: translateX(1rem);
    transition: all .3s cubic-bezier(0.285, -0.450, 0.935, 0.110);
    transition-delay: 0.2s;
}
.search-wrapper.active .close {
    right:-50px;
    opacity: 1;
    transform: rotate(45deg);
    transition: all .6s cubic-bezier(0.000, 0.105, 0.035, 1.570);
    transition-delay: 0.5s;
}
.search-wrapper .close::before, .search-wrapper .close::after {
    position:absolute;
    content:'';
    background: #FE5F55;
    border-radius: 2px;
}
.search-wrapper .close::before {
    width: 5px;
    height: 25px;
    left: 10px;
    top: 0px;
}
.search-wrapper .close::after {
    width: 25px;
    height: 5px;
    left: 0px;
    top: 10px;
}

</style>