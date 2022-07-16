<template>
    <div>
        <div class="product-progress-bar">
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" 
                aria-valuemax="100" :style="{width:this.productFiveStart + '%'}">
                        5 star
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" 
                aria-valuemax="100" :style="{width:this.productFourStart + '%'}">
                        4 star
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" 
                aria-valuemax="100" :style="{width:this.productThreeStart + '%'}">
                        3 star
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="70" aria-valuemin="0" 
                aria-valuemax="100" :style="{width:this.productTwoStart + '%'}">
                        2 star
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" 
                aria-valuemax="100" :style="{width:this.productFiveStart + '%'}">
                        1 star
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props: ['product'],
    data() {
        return {
            productRating: [],
            productFiveStart: '',
            productFourStart: '',
            productThreeStart: '',
            productTwoStart: '',
            productOneStart: '',
        }
    },

    mounted() {
        this.fiveStart()
        this.fourStart()
        this.threeStart()
        this.twoStart()
        this.oneStart()
    },

    methods: {
        fiveStart(){
            axios.get('/product/fivestar/count/' + this.product.id)
                .then(response => {
                    //console.log(response);
                    this.productFiveStart = response.data
                }).catch(error => {
                    console.log(error)
                })
        },
        fourStart(){
            axios.get('/product/fourstar/count/' + this.product.id)
                .then(response => {
                    this.productFourStart = response.data
                }).catch(error => {
                    console.log(error)
                })
        },
        threeStart(){
            axios.get('/product/threestar/count/' + this.product.id)
                .then(response => {
                    this.productThreeStart = response.data
                }).catch(error => {
                    console.log(error)
                })
        },
        twoStart(){
            axios.get('/product/twostar/count/' + this.product.id)
                .then(response => {
                    this.productTwoStart = response.data
                }).catch(error => {
                    console.log(error)
                })
        },
        oneStart(){
            axios.get('/product/onestar/count/' + this.product.id)
                .then(response => {
                    this.productOneStart = response.data
                }).catch(error => {
                    console.log(error)
                })
        },
    },
}
</script>