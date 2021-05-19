<template>
     <form @submit.prevent="updatebook">
       <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" v-model="book.name" >
   
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" v-model="book.email" >
   
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" v-model="book.password">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</template>
<script>
export default {
        data() {
            return {
                book: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/book/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.book = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updatebook() {
                this.axios
                    .post(`http://localhost:8000/api/book/update/${this.$route.params.id}`, this.book)
                    .then((response) => {
                        this.$router.push({name: 'display'});
                    });
            }
        }
    }
</script>