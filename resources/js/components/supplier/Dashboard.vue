<template>
    <div>
        <div class="deshboard-header-wrapper">
           <div class="select-option-outer"></div>

           <div class="deshboard-product-search">
               <form class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by product name...." v-model="searchData">
                    <button class="deshboard-search-btn" type="submit" title="Search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
           </div>
       </div>
       <div class="supplier-product-dashboard-wrapper">
           <table class="supplier-product-dashboard-table">
               <thead>
                   <tr>
                       <th>image</th>
                       <th>product name</th>
                       <th>product category</th>
                       <th>price</th>
                       <th>quantity</th>
                       <th>status</th>
                       <th>action</th>
                   </tr>
               </thead>
               <tbody v-for="product in productsPages[currentPage -1]" :key="product.id">
                   <tr>
                       <td class="supplier-item-image">
                            <img :src="'/product/images/' + product.image">
                        </td>
                       <td class="supplier-item-title" maxlength="20">{{ product.name }}</td>
                       <td class="supplier-item-title">{{ product.category.name }}</td>
                       <td class="supplier-item-price">{{ product.regular_price }} BDT</td>
                       <td class="supplier-item-quantity">{{ product.stock }}</td>
                       <td class="supplier-item-quantity">
                           <h3 class="item-price" v-if="product.status == 1">
                                <span class="badge badge-success">Approved</span>
                            </h3>
                            <h3 class="item-price" v-else>
                                <span class="badge badge-danger">Pending</span>
                            </h3> 
                       </td>
                       <td >
                           <div class="supplier-item-action-btn">
                                <a :href="'/supplier/product/edit/' + product.id + '/' + product.slug" class="product-edit" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <button class="product-delete" title="Delete" style="cursor: pointer;" @click="productDelete(product.id)">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                           </div>
                       </td>
                   </tr>
               </tbody>
           </table>
       </div>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        props:['vendor_id'],
        data() {
            return {
                products: [],
                searchData: '',
                productsPages: [],
                perPage: 10,
                pageCount: 1,
                currentPage: 1,
            }
        },

        watch:{
            searchData (value) {
                this.setCurrentPage(1)
                this.generatePages(this.products)
                if (this.searchData != '') {
                    let search = this.products.filter(product => {
                        if (product.name.indexOf(this.searchData) !== -1) {
                            return product
                        }
                    })
                    this.generatePages(search)
                }
            }
        },

        mounted() {
            this.supplierProducts()
        },

        methods: {
            supplierProducts(){
                axios.get('/api/supplier/products/' + this.vendor_id)
                    .then(response => {
                        this.products = response.data.products
                        this.generatePages(this.products)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            productDelete(id){
                axios.delete('/api/product/delete/' + id)
                    .then(response => {
                        this.products = this.products.filter(product=>{
                            return product.id != id;
                        })
                        this.generatePages(this.products)
                    }).catch(error => {
                        console.log(error)
                    })
            },

            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (product) {
                this.productsPages = _.chunk(product, this.perPage)
                this.pageCount = 0
                this.pageCount = this.productsPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No products found"
                }
            },
        },
    }

</script>

<style scoped>
    .product-delete:focus {
        outline: none;
    }
    .supplier-product-dashboard-table {
        width: 100%;
        text-align: center;
    }
    thead tr,
    tbody tr {
        border-bottom: 1px solid #ccc;
    }
    thead tr th {
        padding-bottom: 10px;
        text-transform: capitalize;
        font-size: 16px;
    }
    tbody tr td {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .supplier-product-dashboard-wrapper {
        overflow-x: auto;
        height: 100vh;
    }
</style>
