/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

window.events = new Vue();
window.Reload = new Vue();

window.flash = function(message) {
    window.events.$emit('flash', message);
}

import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate)

Vue.prototype.$userName = document.querySelector("meta[name='user_name']").getAttribute('content');
Vue.prototype.$authUserId = document.querySelector("meta[name='user_id']").getAttribute('content');



Vue.component('search', require('./components/Search.vue').default);
Vue.component('feature-products', require('./components/FeatureProducts.vue').default);
Vue.component('hot-products', require('./components/HotProducts.vue').default);
Vue.component('discount-products', require('./components/DiscountProducts.vue').default);
Vue.component('new-arrival-products', require('./components/NewArrivalProducts.vue').default);
Vue.component('feature-products-list', require('./components/featureProduct/Products.vue').default);
Vue.component('hot-products-list', require('./components/hotProduct/Products.vue').default);
Vue.component('discount-products-list', require('./components/discountProduct/Products.vue').default);
Vue.component('new-arrival-products-list', require('./components/newArrivalProduct/Products.vue').default);
Vue.component('flash', require('./components/Flash.vue').default);
Vue.component('add-cart', require('./components/Cart.vue').default);
Vue.component('cart-products', require('./components/CartProducts.vue').default);
Vue.component('related-product', require('./components/RelatedProduct.vue').default);
Vue.component('product-details', require('./components/ProductDetails.vue').default);
Vue.component('top-product', require('./components/topProduct/Products.vue').default);
Vue.component('top-product-list', require('./components/topProduct/Products.vue').default);
Vue.component('upcomming-product', require('./components/upcomingProduct/Products.vue').default);
Vue.component('category-products-list', require('./components/CategoryProducts.vue').default);
Vue.component('subcategory-products-list', require('./components/SubcategoryProducts.vue').default);
Vue.component('index-upcoming-products', require('./components/UpcomingProducts.vue').default);
Vue.component('index-top-products', require('./components/TopProducts.vue').default);

/*Supplier dashboard component here*/
Vue.component('supplier-dashboard', require('./components/supplier/Dashboard.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
const search = new Vue({
    el: '#search',
});
