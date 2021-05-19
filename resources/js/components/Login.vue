<template>
<div>
  <div class="error" v-if="error.length > 0">
    {{error}}
  </div>
  <div v-if="message">
{{message}}
  </div>

       <form @submit.prevent="checkdata">

  <div class="form-group">
    <label>Email address</label>
    <input type="email"  class="form-control" v-model="data1.email">
   
  </div>
  
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" v-model="data1.password" >
   
  
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</template>
<script>
export default {
    data(){
return{
    data1:{},
    error : ""
  }
 },
 props:{
   message:{
     type:String
   }
 },
 methods:{
checkdata(){
this.axios
.post('http://127.0.0.1:8000/api/data/login',this.data1)
 .then(response =>{
   this.$router.push({name:'display'})
   console.log(response)
   if(response.status == 400){
     this.error = response.data.msg
    
   }
   else{
     this.name=response.data.username
   }
 }).catch(err=>{
   console.log(err)
   this.error=err.response.data.msg
 })
    }
  
  }
}
</script>
<style>
.error{
  color:red;
}
</style>