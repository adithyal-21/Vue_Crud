<template>
<div>
    <div v-if="state.length > 0">
{{state}}
    </div>
    <form @submit.prevent="storedata" enctype="multipart/form-data">
       <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" v-model="data.name" >
   
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="email" class="form-control" v-model="data.email" >
   
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" v-model="data.password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</template>
<script>
export default {
    data(){
        return{
            data: {},
            state:""
        }
    },
      
    methods:{
       storedata(){
             this.axios
            .post('http://127.0.0.1:8000/api/data',this.data)
            .then(response=>{
                this.$router.push({name:'login',params:{message:response.data.status}})
                console.log(response)
                if(response.status == 200)
                {
                    this.state=response.data.status
                }
            }).catch(error => {
                console.log(error)
                this.state=error.response.data.status

            })
        }
    }
}
</script>