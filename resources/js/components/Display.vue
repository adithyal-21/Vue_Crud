 <template>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">name</th>
      <th scope="col">Email</th>
       <th scope="col">edit</th>
       <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <tr  v-for="book in books" :key="book.id">
      <td>{{book.name}}</td>
      <td>{{book.email}}</td>
      <td>
       <router-link :to="{name: 'edit', params: { id: book.id }}" class="btn btn-primary">Edit</router-link>
    </td>
    <td> <button class="btn btn-danger" @click="deleteBook(book.id)">Delete</button></td>
        </tr>
        <tr>
            <td><button @click.prevent="logout">Logout</button></td>
            </tr>
  </tbody>
</table>


</template>

<script>
export default {
data(){
    
    return{
books:[]
    }
},
created(){
    this.axios
    .get('http://127.0.0.1:8000/api/books')
    .then(response=>{
        this.books=response.data;
    });
},
methods:{
    deleteBook(id){
        this.axios
        .delete(`http://127.0.0.1:8000/api/book/delete/${id}`)
        .then(response => {
                        let i = this.books.map(item => item.id).indexOf(id); // find index of your object
                        this.books.splice(i, 1)
                        window.alert('deleted')
                    });
    },
    logout(){
        this.axios
        .get('http://127.0.0.1:8000/api/book/logout')
        .then(response=>{
            this.$router.push({name:'home'})
        })
    }
}
}
</script>

