<template>
<div>
<input type="text" v-model="newmovie">
<button @click="add">Add</button>
 <ul>
     <li v-for="item in items" :key="item">
{{item}}
     </li>
 </ul>
 </div>
</template>
<script>
export default {
newmovie:"",
   data(){
       return{
           items:['adithya','21082000']
       }
   }
   ,methods:{
       add(){
           if(this.newmovie !== '')
           this.items.push(this.newmovie);
           this.newmovie='';
       }

   }
    }
   
</script>