<template>
<div>
  <div class="row">
    <div class="col-md-4">
      <div class="pos-section">
        <div class="form-group">
            <label>Customer</label>
            <input type="text" name="customer" class="form-control" >
        </div>  
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
      <td><input type="number" @change="calculatePrice(data.unitprice)" v-model="qty"></td>
      <td>{{data.unitprice}}</td>
      <td>{{totalPrice}}</td>
    </tr>
  </tbody>
</table>

 <div class="form-group">
 <input type="Button" name="submit" class="btn btn-primary" value="Checkout" >
</div>

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
         <div class="row">
           <div class="col-md-4"  v-for="(item, index) in products" :key="index">
              <div class="card">
                <img :src="'/storage/cover_images/'+item.cover" alt="" class="card-img-top" @click="setpos(item)">
                <div class="card-body">
                  <h5 class="card-title">{{item.name}}</h5>
                </div>
              </div>
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
          pos: [],
          totalPrice: 0,
          qty: 1

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
               unitprice :product.price,
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
          },
          calculatePrice(price){
            this.totalPrice = this.qty * price;
            return totalPrice
          },
          //checkout
          setData(){
             axios.post('api/temppos',{
               category : product.category_id,
               subcategory : product.subcategory_id,
               item : product.id,
               customer : product.id,
               unitprice :product.price,
               totalprice : 900,
          })
        }
      }
    }
    </script>

<style scoped>
input {
  width: 50px;
}
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
