<template>
    <div>
        <section class="product-page-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="product-page-leftside-wrapper">
                            <h4 class="leftside-heading">
                                Filter
                            </h4>
                            <div class="leftside categories">
                                <h4 class="leftside categories-title collapsed" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">
                                    categories
                                    <i class="fas fa-chevron-down"></i>
                                </h4>
                                <form class="leftside categories-checkbox collapse show" id="collapseOne">
                                    <div class="checkbox" v-for="category in getCategories" :key="category.id">
                                        <label :for="category.id">
                                            <input type="checkbox" :value="category.id" :id="category.id" v-model="categoryIds" @change="getFilterProduct()" class="checkbox">
                                            {{ category.name }}
                                        </label>
                                    </div>
                                </form>
                            </div>
                            <div class="leftside sub-categories">
                                <h4 class="leftside sub-categories-title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseOne">
                                    sub categories
                                    <i class="fas fa-chevron-down"></i>
                                </h4>
                                <form class="leftside sub-categories-checkbox collapse" id="collapseTwo">
                                    <div class="checkbox" v-for="subcategory in getSubategories" :key="subcategory.id">
                                        <label :for="subcategory.id">
                                            <input type="checkbox" :value="subcategory.id">
                                            {{ subcategory.name }}
                                        </label>
                                    </div>
                                </form>
                            </div>
                            <div class="leftside manufactures">
                                <h4 class="leftside manufactures-title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseOne">
                                    Brands
                                    <i class="fas fa-chevron-down"></i>
                                </h4>
                                <form class="leftside manufactures-checkbox collapse" id="collapseThree">
                                    <div class="checkbox" v-for="brand in getBrands" :key="brand.id">
                                        <label :for="brand.id">
                                            <input type="checkbox" :value="brand.id" :id="brand.id" @change="getFilterProduct()"
                                                   v-model="brandIds">
                                            {{ brand.name }}
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-page-header-wrapper">
                                    <div class="left-side-box">
                                        <h4 class="title">
                                            New Arrival Products
                                        </h4>
                                    </div>
                                    <div class="right-side-box">
                                        <h4 class="product-qty">
                                            Total Products
                                            <span class="number">{{ this.products.length }}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6" v-for="product in products" :key="product.id">
                                <div class="product-section-item">
                                    <div class="product-item-image-outer">
                                        <a :href="'/product/details/' + product.id + '/' + product.slug" class="item-image-inner">
                                            <img :src="'/product/images/240x240-' + product.image">
                                        </a>
                                    </div>
                                    <div class="product-item-content">
                                        <a :href="'/product/details/' + product.id + '/' + product.slug" class="title">
                                            {{ product.name.substr(0,25) }}
                                        </a>
                                        <div class="price-cart-btn-wrapper">
                                            <div class="price">
                                                ৳ {{ product.regular_price.toFixed(2) }}
                                            </div>
                                            <div class="add-to-card">
                                                <button class="add-to-card-btn" @click="addToCart(product)" style="cursor: pointer">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                            <!--                                        <div class="add-to-card" v-else>-->
                                            <!--                                            <a :href="'/customer/login-form'" class="add-to-card-btn">-->
                                            <!--                                                <i class="fas fa-cart-plus"></i>-->
                                            <!--                                            </a>-->
                                            <!--                                        </div>-->
                                        </div>
                                        <div class="single-product-rating">
                                            <div class="rating-outer">
                                                <ul v-if="product.reviews.length == 0">
                                                    <li>
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                </ul>
                                                <ul v-else>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="total-rating">
                                                <span>{{ product.reviews.length }} Review</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            getCategories: [],
            getSubategories: [],
            getBrands: [],
            products: [],
            categoryIds: [],
            subcategoryIds: [],
            brandIds: []
        }
    },

    mounted() {
        this.getAllCategory(),
            this.getAllSubcategory(),
            this.getAllBrand(),
            this.getProducts()
    },

    methods: {
        getAllCategory(){
            axios.get('/api/get/categories')
                .then(response => {
                    this.getCategories = response.data.categories
                }).catch(error => {
                console.log(error)
            })
        },
        getAllSubcategory(){
            axios.get('/api/get/subcategories')
                .then(response => {
                    this.getSubategories = response.data.subcategories
                }).catch(error => {
                console.log(error)
            })
        },

        getAllBrand(){
            axios.get('/api/get/brands')
                .then(response => {
                    this.getBrands = response.data.brands
                }).catch(error => {
                console.log(error)
            })
        },

        getProducts(){
            axios.get('/api/top/products/list')
                .then(response => {
                    this.products = response.data.products
                }).catch(error => {
                console.log(error)
            })
        },

        addToCart(product){
            axios.post('/add/to/cart/' + product.id,{
                product_id: product.id,
                qty:1,
                user_id:1,
                price: product.regular_price,
            }).then(response => {
                if(response.status == 200){
                    Reload.$emit('afterAddToCart');
                    flash('Product has been successfully added to cart.', 'success');
                }
                console.log(response)
            }).catch(error => {
                console.log(error)
            })
        },
        getFilterProduct(){
            axios.post('/api/getFilterProduct', {category_ids:this.categoryIds, subcategory_ids:this.subcategoryIds, brand_ids: this.brandIds} )
                .then(response => {
                    if(this.categoryIds.length > 0 || this.brandIds.length > 0 || this.subcategoryIds.length > 0){
                        this.products = response.data
                    }else{
                        this.getProducts()
                    }
                }).catch(error => {
                console.log(error)
            })
        },
    },
}
</script>

<style scoped>
.product-item-content .title{
    font-size: 14px;
}
.product-section-item img{
    width: 100%;
    height: 170px;
}
.price-cart-btn-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 5px;
}
.product-item-image-outer {
    margin-bottom: 5px!important;
}
.add-to-card-btn {
    margin: 0;
    padding: 5px 10px;
    background: #fff;
}
.single-product-rating {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 5px;
}
.rating-outer ul {
    padding-left: 0;
    display: flex;
    align-items: center;
    margin-bottom: 0;
}
.rating-outer ul li i {
    color: #154360;
    font-size: 14px;
}
.total-rating span {
    font-size: 14px;
    font-family: 'Poppins';
    font-weight: 500;
}
</style>
