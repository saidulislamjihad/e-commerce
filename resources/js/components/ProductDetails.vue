<template>
    <div>
        <div class="container card">
            <div class="row card-body">
                <div class="col-md-12 col-sm-12">
                    <div id="app">
                        <div class="container container-space">
                            <div class="row">
                                <div class="col-md-5">
                                    <img v-show="!thumnailImage" :src = "'/product/images/240x240-' + details.image" alt = "shoe image" class="product-details-main-img">
                                    <img v-show="thumnailImage" :src = "'/galleryImage/' + thumnailImage" alt = "shoe image" class="product-details-main-img">
                                    <div class="product-thumbnails">
                                        <ul>
                                            <li v-for="(gallery, index) in galleryImages" :class="[activeClass == index ? 'thumbnail-active': '']"
                                                :key="index"><img @click="currentThumnail(gallery.gallery_image, index)"
                                                :src="'/galleryImage/' + gallery.gallery_image" alt="" />
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h1 class="details-product-name">{{details.name}}</h1>
                                    <div class="single-product-details-rating">
                                    <div class="product-details-rating-outer">
                                         <ul v-if="avgReview >= 5">
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
                                         </ul>
                                         <ul v-else-if="avgReview == 4">
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
                                             <li>
                                                 <i class="far fa-star"></i>
                                             </li>
                                         </ul>
                                         <ul v-else-if="avgReview == 3">
                                             <li>
                                                 <i class="fas fa-star"></i>
                                             </li>
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
                                         </ul>
                                         <ul v-else-if="avgReview == 2">
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
                                         <ul v-else-if="avgReview == 1">
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
                                             <li>
                                                 <i class="far fa-star"></i>
                                             </li>
                                         </ul>
                                         <ul v-else>
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
                                    </div>
                                    <div class="total-rating">
                                        <span>{{ avgReview }} Review</span>
                                    </div>
                                </div>
                                    <h3 class="details-product-price">
                                        Price: ৳
                                        <span>
                                            {{details.regular_price.toFixed(2)}}
                                        </span>
                                    </h3>

                                    <h4 class="details-product-stock">
                                       Stock:
                                       <span v-if="details.stock > 0">
                                            {{details.stock}}
                                       </span>
                                       <span v-else>
                                            {{details.stock}}
                                       </span>
                                    </h4>
                                    <h4 class="details-product-out-stock text-danger" v-if="details.stock == 0">Oops!! Out Of Stock</h4>
                                    <h3 class="product-details">
                                        Short Description:
                                    </h3>
                                    <p class="product-short-details">
                                        {{details.short_description.substr(0,179)}}
                                    </p>
                                     <div class = "purchase-info" v-if="details.stock == 0">
                                        <div class="product-quantity">
                                            <input type="number" min="1" disabled max="10" value="1" class="quantity" v-model="qty" id="qty" placeholder="Qty">
                                        </div>
                                        <button type = "button" class = "btn" @click="addToCartDetailsPage(details)" disabled>
                                            <i class = "fas fa-shopping-cart"></i>
                                             Add to Cart
                                        </button>
                                    </div>

                                    <div class = "purchase-info" v-else>
                                        <div class="product-quantity">
                                            <input type="number" min="1" max="10" value="1" class="quantity" v-model="qty" id="qty" placeholder="Qty">
                                        </div>
                                        <button type = "button" class = "btn" @click="addToCartDetailsPage(details)">
                                            <i class = "fas fa-shopping-cart"></i>
                                             Add to Cart
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 px-0">
                                    <div class="seller-delivary-service-wrapper">
                                        <div class="seller-delivary-outer">
                                            <h6 class="delivary-header-title">
                                                Product address
                                            </h6>
                                            <div class="delivary-location-outer">
                                                <div class="location-body">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <address>
                                                        {{ details.product_address ? details.product_address : 'House# 6, Road#1/A, Level-3, Section-9 uttara Dhaka' }}
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="delivary-option-outer">
                                                <h6 class="service-header-title">
                                                    Delivery Area
                                                </h6>
                                                <div>
                                                    <span>Inside Dhaka : {{ details.inside_dhaka }}</span> <br/>
                                                    <span>Outside Dhaka : {{ details.outside_dhaka }}</span>
                                                </div>
                                                <hr/>
                                                <div class="delivary-option-inner">
                                                    <div class="delivary-option-title">
                                                        <i class="fas fa-home"></i>
                                                        <div class="delivary-option-info">
                                                            Home Delivery
                                                            <p>{{ details.delivery_time }}(s)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="delivary-cashon-outer">
                                                <i class="fas fa-money-bill-wave"></i>
                                                <span>
                                                    Cash on Delivery Available
                                                </span>
                                            </div>
                                        </div>
                                        <div class="seller-service-outer">
                                             <h6 class="service-header-title">
                                                service
                                            </h6>
                                            <div class="service-return-policy-outer">
                                                <i class="fab fa-rev"></i>
                                                <div class="service-return-policy-title">
                                                    <span>
                                                        7 Days Returns
                                                    </span>
                                                    <p>
                                                        Change of mind is not applicable
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="service-warranty-outer">
                                                <i class="far fa-times-circle"></i>
                                                <span>
                                                    Warranty available
                                                </span>
                                            </div>
                                            <div class="product-video-outer">
                                                <a href="#">
                                                    <i class="fas fa-video"></i>
                                                    <span>Product Video</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="product-details-tab">
                        <ul class="nav nav-pills">
                            <li class="nav-list-item active">
                                <a data-toggle="pill" href="#tab1" class="active show">
                                    Description
                                </a>
                            </li>
                            <li class="nav-list-item">
                                <a data-toggle="pill" href="#tab2">
                                    Review
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in show active">
                              <p v-html="details.long_description"></p>
                            </div>
                            <div id="tab2" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-rating-inner">
                                            <h4 class="title">
                                                Product rating
                                            </h4>
                                            <h1 class="rating-number">
                                                {{ avgRating }}
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <review :product="details"></review>
                                    </div>
                                </div>
                                <div class="col-md-8 m-auto">
                                    <review-form :product="details"></review-form>
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
import axios from 'axios'
    import review from './Review.vue'
    import reviewForm from './ReviewForm.vue'
    export default {
        props:['details'],
        data(){
            return {
                galleryImages: this.details.product_images,
                qty: '',
                activeClass: 0,
                thumnailImage: '',
                avgRating: '',
                avgReview: '',
                delivery_charge: ''
            }
        },
        mounted() {
            this.productAvgratingCount();
            this.productAvgRating()
            Reload.$on('productReview', () => {
               this.productAvgratingCount()
           })
        },

        components: {
			review,
            reviewForm
		},

        methods: {
           addToCart(product){
               axios.post('/add/to/cart/' + product.id,{
                   product_id: product.id,
                   qty:1,
                   user_id:this.$authUserId,
                   price: product.regular_price,
                   delivery_charge: this.delivery_charge,
               }).then(response => {
                   if(response.status == 200){
                       Reload.$emit('afterAddToCart');
                       flash('Product has been successfully added to cart.', 'success');
                   }
                   //console.log(response)
               }).catch(error => {
                   console.log(error)
               })
           },
           addToCartDetailsPage(item){
               axios.post('/add/to/cart/details/page/' + item.id,{
                   product_id: item.id,
                   qty:this.qty,
                   user_id:this.$authUserId,
                   price: item.regular_price,
                   delivery_charge: this.delivery_charge,
               }).then(response => {
                   if(response.status == 200){
                       Reload.$emit('afterAddToCart');
                       flash('Product has been successfully added to cart.', 'success');
                       this.qty = ''
                   }
                   //console.log(response)
               }).catch(error => {
                   //console.log(error.status)
                   if(error.status === 500){
                       alert('Something is missing Please try again.')
                   }
               })
           },
           currentThumnail(image, index){
               //console.log(index);
               this.thumnailImage = image
               this.activeClass = index
           },

           productAvgratingCount(){
               axios.get('/product/review/count/' + this.details.id)
                .then(response => {
                    this.avgRating = response.data
                }).catch(error => {
                    console.log(error)
                })
           },
           productAvgRating(){
               axios.get('/product/avg/review/' + this.details.id)
                .then(response => {
                    this.avgReview = response.data
                }).catch(error => {
                    console.log(error)
                })
           },
       }
    }
</script>

<style scoped>
    .container-space {
            background: #fff;
            padding: 5px;
    }
    .product-thumbnails {
        display: flex;
        margin-top: 2rem;
    }
    .product-thumbnails > ul {
        display: flex;
        list-style: none;
        padding-left: 0;
    }
    .product-thumbnails > li {
        margin-right: 10px;
    }
    .product-thumbnails > ul > li > img {
        width: 100px;
        cursor: pointer;
    }
    .thumbnail-active {
        border: 2px solid #000;
    }
    .nav-link > img {
        width: 40px;
        border-radius: 8px;
        margin-right: 10px;
    }
    .btn-custom-color {
        border: 2px solid #4fc08d;
        color: #4fc08d;
    }
    .btn-custom-color:hover {
        border: 2px solid #4fc08d;
        background-color: #4fc08d;
        color: #ffffff;
    }
    .product-details-main-img {
            border: 1px solid #154360;
            width: 100%;
            height: 400px;
    }
    .details-product-name {
            font-size: 30px;
            font-weight: 500;
            font-family: 'Poppins';
            text-transform: capitalize;
            color: #4d5154;
            margin-bottom: 0;
    }
    .details-product-price {
            font-size: 16px;
            font-weight: 400;
            font-family: 'Poppins';
            color: #000;
    }
    .details-product-price span {
            font-size: 23px;
        }
    .details-product-stock {
            font-size: 16px;
            font-weight: 400;
            font-family: 'Poppins';
            color: #000;
    }
    .details-product-out-stock {
        font-size: 20px;
        font-weight: 400;
        font-family: 'Poppins';
        color: #4d5154;
    }
    .product-details {
        font-size: 20px;
        font-family: 'Poppins';
        font-weight: 400;
    }
    .details-product-stock span {
        font-size: 20px;
    }
    .product-short-details {
        font-size: 15px;
        font-weight: 400;
        font-family: 'Poppins';
        margin-bottom: 0;
    }
    .product-quantity input.quantity {
        width: 130px;
        height: 37px;
        border: 1px solid #154360;
        border-radius: 4px;
    }
    .product-quantity input.quantity:focus {
        border-color: #154360;
        box-shadow: 0 0 10px #154360;
    }
    .seller-delivary-service-wrapper {
        background: #fafafa;
        box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
        padding: 10px;
        border-radius: 5px;
    }
    .delivary-header-title {
        background: #ddd;
        padding: 5px;
        font-size: 14px;
        font-family: 'Poppins';
        font-weight: 400;
    }
    .product-details-section {
        background: #eff0f5;
    }
    .delivary-location-outer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 5px 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }
    .delivary-option-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .location-body {
        display: flex;
        align-items: center;
        justify-content: center;
        padding-right: 15px;
    }

    .location-body address {
        margin-bottom: 0;
        line-height: initial;
        margin-left: 7px;
    }

    .location-body i {
        font-size: 18px;
    }

    .delivary-option-outer {
        padding: 0 5px 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }
    .shipping-free-form {
        margin-bottom: 10px;
    }
    .shipping-free-form select {
        width: 100%;
        height: 35px;
        border: 1px solid #000;
    }
    .shipping-free-form select:focus-visible {
        outline: none;
    }
    .delivary-option-title {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
    }
    .location-link-change a {
        font-size: 15px;
        font-family: 'Poppins';
        font-weight: 400;
        color: #000;
    }

    .delivary-option-title i {
        font-size: 18px;
    }

    .delivary-option-info {
        font-family: 'Poppins';
        font-size: 15px;
        font-weight: 400;
        margin-left: 7px;
    }

    .delivary-option-info p {
        margin-bottom: 0;
    }

    .delivary-option-shipping-free {
        font-size: 16px;
        font-weight: 800;
    }

    .delivary-cashon-outer i {
        font-size: 18px;
    }

    .delivary-cashon-outer span {
        margin-left: 7px;
        font-size: 15px;
        font-weight: 400;
    }

    .delivary-cashon-outer {
        padding: 0px 5px 10px;
        border-bottom: 1px solid #ccc;
        margin-bottom: 10px;
    }

    .service-header-title {
        background: #ddd;
        padding: 5px;
        font-size: 14px;
        font-family: 'Poppins';
        font-weight: 400;
    }

    .service-return-policy-outer i {
        font-size: 20px;
    }
    .service-return-policy-outer {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .service-return-policy-title {
        margin-left: 10px;
    }

    .service-return-policy-title p {
        font-size: 14px;
        font-weight: 400;
        margin-bottom: 0;
    }

    .service-return-policy-title span {
        font-size: 15px;
        font-family: 'Poppins';
        font-weight: 400;
    }

    .service-warranty-outer {
        padding-bottom: 10px;
    }

    .service-warranty-outer i {
        font-size: 20px;
    }
    .service-warranty-outer span {
        font-size: 15px;
        font-weight: 400;
        font-family: 'Poppins';
        margin-left: 10px;
    }
    .single-product-details-rating {
        display: flex;
        align-items: center;
        margin-bottom: 4px;
    }
    .product-details-rating-outer {
        margin-right: 10px;
    }
    .product-details-rating-outer ul {
        padding-left: 0;
        display: flex;
        align-items: center;
        margin-bottom: 0;
    }
    .product-details-rating-outer ul li i {
        color: #154360;
        font-size: 14px;
    }
    .total-rating span {
        font-size: 14px;
        font-family: 'Poppins';
        font-weight: 500;
    }
    .product-video-outer a {
        display: block;
        color: #000;
    }
    .product-video-outer a i {
        font-size: 18px;
        color: #000;
    }
    .product-video-outer a span {
        font-size: 15px;
        font-weight: 400;
        font-family: 'Poppins';
        margin-left: 10px;
        color: #000;
    }
    .product-short-details {
        height: 130px;
    }
</style>
