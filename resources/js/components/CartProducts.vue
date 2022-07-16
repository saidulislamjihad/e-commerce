<template>
    <div>
        <section class="product-cart-section">
			<div class="container-fluid">
				<h1 class="cart-section-title">View Cart</h1>
				<div class="row">
                    <div class="col-md-12 product-cart-item-title">
                        <div class="row">
                        	<div class="col-md-2">
                        		<h4 class="title">image</h4>
                        	</div>
                        	<div class="col-md-2">
                        		<h4 class="title">product name</h4>
                        	</div>
                        	<div class="col-md-2">
                        		<h5 class="title">
									price
								</h5>
							</div>
							<div class="col-md-2">
								<h5 class="title">
									quantity
								</h5>
							</div>
							<div class="col-md-2">
								<h5 class="title">
									remove
								</h5>
							</div>
							<div class="col-md-2">
								<h5 class="title">
									total
								</h5>
							</div>
                        </div>
                    </div>
					<div class="col-md-12">
						<cart-row v-for="product in products" :product="product" :key="product.id"></cart-row>
					</div>
					<div class="col-md-4 m-auto">
						<div class="total-price-item-wrapper">
							<div class="sub-total-inner">
								<h5>
									subtotal
								</h5>
								<span>
									৳ {{ this.totalPrice.toFixed(2) }}
								</span>
							</div>
							<div class="total-inner">
								<h5>
									total
								</h5>
								<span>
									৳ {{ this.totalPrice.toFixed(2) }}
								</span>
							</div>
							<div class="checkout-btn-inner">
								 <a :href="'/checkout'" class="checkout-btn" v-if="$authUserId">Checkout</a>
                                <a :href="'/customer/login-form'" class="checkout-btn" v-else>Checkout</a>
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
import cartRow from './CartRow.vue'
    export default {
		props:['auth_user'],
        data() {
            return {
                products: [],
				totalPrice: '',
				totalQty: '',
            }
        },
		components: {
			cartRow
		},

		mounted() {
			this.authUserProducts();
			this.totalCartProductsPrice();
			this.totalCartProducts();
			Reload.$on('afterAddToCart', () => {
			   this.authUserProducts();
               this.totalCartProductsPrice();
			   this.totalCartProducts();
           })
		},

		methods: {
			authUserProducts(){
				axios.get('/get/customer/products/' + this.auth_user)
					.then(response => {
						this.products = response.data
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
