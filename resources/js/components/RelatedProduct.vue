<template>
    <div>
        <div class="related-product-items-wrapper owl-carousel">
            <div class="product-section-item" v-for="relatedProduct in relatedProducts" :key="relatedProduct.id">
                <div class="product-item-image-outer">
                    <a :href="'/product/details/' + relatedProduct.id + '/' + relatedProduct.slug" class="item-image-inner">
                        <img :src="'/product/images/240x240-' + relatedProduct.image">
                    </a>
                </div>
                <div class="product-item-content">
                    <a href="#" class="title">
                        {{ relatedProduct.name.substr(0,25) }}
                    </a>
                    <div class="price-cart-btn-wrapper">
                        <div class="price">
                            ৳ {{ relatedProduct.regular_price.toFixed(2) }}
                        </div>
                        <div class="add-to-card">
                            <button class="add-to-card-btn" @click="addToCart(relatedProduct)" style="cursor: pointer">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
<!--                        <div class="add-to-card" v-else>-->
<!--                            <a :href="'/customer/login-form'" class="add-to-card-btn">-->
<!--                                <i class="fas fa-cart-plus"></i>-->
<!--                            </a>-->
<!--                        </div>-->
                    </div>
                    <div class="single-product-rating">
                        <div class="rating-outer">
                            <ul v-if="relatedProduct.reviews.length == 0">
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
                            <span>{{ relatedProduct.reviews.length }} Review</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['related'],
        data(){
            return {
                relatedProducts: this.related
            }
        },
        mounted() {

        },

        methods: {
           addToCart(product){
               axios.post('/add/to/cart/' + product.id,{
                   product_id: product.id,
                   qty:1,
                   user_id:this.$authUserId,
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
           }
       }
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
