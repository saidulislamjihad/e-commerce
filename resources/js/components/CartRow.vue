<template>
    <div>
        <div class="cart-section-item-wrapper">            
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="cart-section item-image">
                        <img :src="'/product/images/' + product.product.image" height="76" width="130">
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="cart-section item-title">
                        <h3 class="item-name">
                            {{ product.product.name }}
                        </h3>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="cart-section item-price">
                        <h3 class="item-price">
                            ৳ {{ product.product.regular_price.toFixed(2) }}
                        </h3>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="cart-section item-quantity">
                        <span class="quantity">
                            <input type="number" name="qty" v-model="qty" min="1" @click="cartIncrement(product.id)">
                        </span>
                        <span class="badge badge-primary" style="padding: 7px; font-size: 16px;">{{ product.qty }}</span> 
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="cart-section item-remove-btn">
                        <button class="remove-product" @click="removeCartProduct(product.id)">Remove</button>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="cart-section item-total">
                        <span class="total-price">
                            ৳ {{ product.product.regular_price * product.qty }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-responsive-item-wrapper">
            <div class="cart-responsive-product-image">
                 <img :src="'/product/images/' + product.product.image" height="80" width="150">
            </div>
            <div class="cart-responsive-product-content">
                <div class="cart-responsive-product-name">
                    <div class="item-title">
                        <h3>
                            {{ product.product.name }}
                        </h3>
                    </div>
                    <div class="item-price">
                        <h3>
                            ৳ {{ product.product.regular_price.toFixed(2) }}
                        </h3>
                    </div>
                </div>
                <div class="cart-responsive-product-total">
                    <div class="item-quantity">
                        <span class="quantity">
                            <input type="number" name="qty" v-model="qty" min="1" @click="cartIncrement(product.id)">
                        </span>
                        <span class="badge badge-primary" style="padding: 7px; font-size: 16px;">{{ product.qty }}</span> 
                    </div>
                    <div class="item-remove-btn">
                        <button class="remove-product" @click="removeCartProduct(product.id)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="item-total">
                        <span class="total-price">
                            ৳ {{ product.product.regular_price * product.qty }}
                        </span>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        props:['product'],
        data() {
            return {
                qty: this.product.qty
            }
        },
        
        methods: {
            removeCartProduct(cartId){
               axios.get('/remove/cart/product/' + cartId)
               .then(response => {
                   Reload.$emit('afterAddToCart')
                   flash('Product has been successfully remove to cart.', 'success');
               }).catch(error => {
                   console.log(error)
               })
           },

           cartIncrement(id){
               axios.post('/cart-product-update/' + id, {
                   qty: this.qty
               }).then(response => {
                   Reload.$emit('afterAddToCart')
                   flash('Product cart has been updated.', 'success');
               }).catch(error => {
                   console.log(error)
               })
           }
        },
    }
</script>