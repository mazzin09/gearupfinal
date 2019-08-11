<template>
<div>
  <div class="row">
    <div class="col-md-4">
      <div class="pos-secti">
        <table class="table table-bordered">
            
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(data, index) in pos" :key="index">
      <th scope="row">{{data.item}}</th>
      <td><input type="text"></td>
      <td>{{data.unitprice}}</td>
      <td>{{data.totalprice}}</td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
    <div class="col-md-8">
      product finder
      <div class="row">
        <div class="col-md-2">
          <div class="category-section">
            <button v-for="(item, index) in categories" :key="index" class="btn btn-primary w-100 my-1" @click="subcategory(item.id)">{{item.name}}</button>
          </div>
        </div>
        <div class="col-md-2">
          <div class="subcategory-section">
            <button v-for="(item, index) in subcategories" :key="index" class="btn btn-primary w-100 my-1" @click="getProducts(item.category_id,item.id)">{{item.name}}</button>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card" v-for="(item, index) in products" :key="index">
            <img src="img/1.jpg" alt="" class="card-img-top" @click="setpos(item)">
            <div class="card-body">
              <h5 class="card-title">{{item.name}}</h5>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
      data() {
        return {
          categories: [],
          subcategories: [],
          products: [],
          pos: []

        }
      },
        mounted() {
            console.log('Component mounted.')
        },
        created()  {
          this.getCategory()
        },
        methods: {
          getCategory() {
            axios.get('api/category')
            .then(response => {
              this.categories = response.data.data
            })
            .catch(error => {
              console.log(error)
            })
          },
          subcategory(category_id) {
           axios.get(`api/subcategory/${category_id}`)
            .then(response => {
              // console.log(response.data.data);
              
              this.subcategories = response.data.data
            })
            .catch(error => {
              console.log(error)
            })
          },
          getProducts(category_id,subcategory_id) {
           axios.get(`api/item/${category_id}/${subcategory_id}`)
            .then(response => {
              // console.log(response.data.data);
              
              this.products = response.data.data
            })
            .catch(error => {
              console.log(error)
            })
          },
          setpos(product){
            axios.post('api/temppos',{
               category : product.category_id,
               subcategory : product.subcategory_id,
               item : product.id,
               unitprice :900,
               totalprice : 900
            })
            .then(response => {
              console.log(response);
              this.getPos();
            })
          },
          getPos(){
             axios.get('api/temppos')
            .then(response => {
              // console.log(response.data.data);
              
              this.pos = response.data.data
            })
            .catch(error => {
              console.log(error)
            })
          }
        }
    }
</script>

<style scoped>
        div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 150px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
    
</style>
