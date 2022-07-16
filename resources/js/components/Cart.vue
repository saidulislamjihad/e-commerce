<template>
    <div>
        <div class="shopping-cart">
                <div class="cart-hide-icon cart-show-hide-btn">
                    <button class="shopping-cart-close-icon">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div class="shopping-cart-items-count">
                    <div class="left">
                        <p class="shopping-cart-item-cont">
                            <span>
                                <i class="fas fa-shopping-bag"></i>
                            </span>
                            <span class="shopping-item-number">
                                {{ this.totalQty }}
                            </span>
                            <span>items</span>
                        </p>
                    </div>
                    <div class="right cart-show-hide-btn">
                        <button class="shopping-cart-close-btn">
                            close
                        </button>
                    </div>
                </div>
                <div class="shopping-delivery">
                    <span>
                        <i class="fas fa-truck"></i>
                        Express Delivery
                    </span>
                </div>
                <div class="shopping-order-items-wrapper">
                    <div class="shopping-order-item-outer" v-for="(cart,index) in getAllCartProducts" :key="cart.id">
                        <div class="order-quantity">
                            <div>
                                <i class="fas fa-chevron-up"></i>
                            </div>
                            <span>{{ index+1 }}</span>
                            <div>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="shopping-order-item-image">
                            <img :src="'/product/images/' + cart.product.image" height="40" width="40">
                        </div>
                        <div class="shopping-order-item-name">
                            <h3 class="name">
                                {{ cart.product.name }}
                            </h3>
                            <span class="sub-text">
                                ৳ {{ cart.price }}
                            </span>
                        </div>
                        <div class="shopping-order-item-amount">
                            <button class="shopping-order-item-delete-btn" @click="removeCartProduct(cart.id)">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="shopping-cart-order-check">
                    <a href="#" class="shopping-order-price">
                        ৳ {{ this.totalPrice }}
                    </a>
                    <a :href="'/checkout'" class="shopping-order-check">
                        Checkout
                    </a>
<!--                    <a :href="'/customer/login-form'" class="shopping-order-check" v-else>-->
<!--                        Checkout-->
<!--                    </a>-->
                    <a :href="'/user/cart/products'" class="shopping-order-view-cart">
                        View Cart
                    </a>
<!--                    <a :href="'/customer/login-form'" class="shopping-order-view-cart" v-else>-->
<!--                        View Cart-->
<!--                    </a>-->
                </div>
            </div>
            <div class="add-cart-outer cart-show-hide-btn">
                <div class="cart-item-count">
                    <i class="fas fa-shopping-bag"></i>
                    <p class="items">
                        <span class="number">{{ this.totalQty }}</span>
                        <span>ITEMS</span>
                    </p>
                </div>
                <div class="items-total-price">
                    <span>৳</span>
                    <h3 class="price">
                        {{ this.totalPrice }}
                    </h3>
                </div>
            </div>
    </div>
</template>

<script>
import axios from 'axios'
   export default {
       data(){
           return {
               getAllCartProducts:[],
               totalQty: '',
               totalPrice: '',
           }
       },

       mounted(){
           this.cartProducts();
           this.totalCartProducts();
           this.totalCartProductsPrice();
           Reload.$on('afterAddToCart', () => {
               this.cartProducts();
               this.totalCartProducts();
               this.totalCartProductsPrice();
           })
       },

       created(){

       },

       methods:{
           cartProducts(){
               axios.get('/cart/products')
                .then(response => {
                    console.log(response)
                    this.getAllCartProducts = response.data;
                    console.log(response)
                }).catch(error => {
                    console.log(error)
                })
           },
           totalCartProducts(){
               axios.get('/cart/products/count')
                .then(response => {
                    this.totalQty = response.data
                }).catch(error => {
                    console.log(error)
                })
           },
           totalCartProductsPrice(){
               axios.get('/cart/products/price')
                .then(response => {
                    this.totalPrice = response.data
                }).catch(error => {
                    console.log(error)
                })
           },

           removeCartProduct(cartId){
               axios.get('/remove/cart/product/' + cartId)
               .then(response => {
                   Reload.$emit('afterAddToCart')
                   flash('Product has been successfully remove to cart.', 'success');
               }).catch(error => {
                   console.log(error)
               })
           }
       }
   }
</script>

<style scoped>

</style>
