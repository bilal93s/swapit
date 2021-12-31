<template>
    <input :name="name" class="form__input" v-bind:class="variant" :id="name" required :placeholder="placeholder" autocomplete="off" />
</template>

<script>
export default {
  name: "Input",
  props:{
    name: {
          type: String,
          required: true,
    },
    variant:{
      type: String,
      default:'white',
      validator: (val) => ["white", "black",].includes(val),
    },
    placeholder:{
      type: String,
      default:'',
    },
  },
};
</script>

<style scoped>;
 .input-container{
	position:relative;
	margin-bottom:25px;
}
.input-container label{
	position:absolute;
	top:0px;
	left:0px;
	font-size:16px;
	color:#fff;	
	transition: all 0.5s ease-in-out;
}
.input-container input{ 
  border:0;
  border-bottom:1px solid #555;  
  background:transparent;
  width:100%;
  padding:8px 0 5px 0;
  font-size:16px;
  color:#C9C9C9;
}
.input-container input:focus{ 
 border:none;	
 outline:none;
 border-bottom:1px solid #FF5D19;	
}


</style>