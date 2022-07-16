<template>
    <div>
        <form class="form-group search-form-outer">
            <input type="text" name="search" v-model="search" class="form-control" placeholder="Search">
            <button class="search-btn" type="button" title="Search">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="col-md-12 bg-white" style="border-radius: 10px;box-shadow: rgb(241 101 34) 2px 5px 10px;" v-show="isOpen">
            <div class="row" v-for="product in products" :key="product.id">
                <div class="col-md-12 text-left">
                    <a :href="'/product/details/' + product.id + '/' + product.slug" style="color: #000; font-size: 14px;">{{ product.name.substr(0,50) }}</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        data() {
            return {
               products: [],
               search: '',
               isOpen: false
            }
        },
        watch:{
            search(after, before) {
            //console.log(after)
                axios.get('/get/search/data/', { params: { search: this.search } })
                    .then(response => {
                        if(this.search.length > 0){
                            this.isOpen = true
                            this.products = response.data
                        }else {
                            this.isOpen = false
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    });
            }
        },
        mounted() {
            this.searchProducts()
        },

        methods: {
            searchProducts(){
               axios.get('/search/products')
                .then(response => {
                    this.products = response.data
                })
                .catch(error => {
                    console.log(error);
                })
           },
        },
    }
</script>

<style scoped>
</style>