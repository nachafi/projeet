<template>
  <div>
    <input type="text" class="form-control" placeholder="enter a text" v-model="q">

    <ul class="autocomplete-results" v-if="products.length > 0">
      <li class="autocomplete-result" v-for="product in products">
    
        <img class="group list-group-image" :src="product.image" alt="" />
        <div class="caption">
            <h4 class="group inner list-group-item-heading">{{ product.name }}</h4>
            <p class="group inner list-group-item-text">{{ product.description }}</p>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p class="lead">${{ product.price }}</p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success" href="#">Add to cart</a>
                </div>
            </div>
        </div>
        </li>
        </ul>
    
</div>
    </template>

<script>
export default {

  props: ['results'],
    data() {
        return {
            q: '',
            products: this.results,
        };
    },


    watch: {
        q(after, before) {
            this.fetch();
        }
    },

    methods: {
        fetch() {
            axios.get('site/pages/products', { params: {q: this.q } })
                  .then((res) => {
                  this.products = res.data.products
                  })
                .catch(error => {});
        },
    }
}
</script>
