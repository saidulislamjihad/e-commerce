<template>
    <div>
        <div class="review-form">
            <h3 class="write-review">
                Write Your Review
            </h3>
               <div class="stars">                   
                    <input class="star star-5" type="radio" id="star5" name="rating" v-model="rating" :value="5"/>
                    <label class="star star-5" for="star5"></label>
                    <input class="star star-4" type="radio" id="star4" name="rating" v-model="rating" :value="4"/>
                    <label class="star star-4" for="star4"></label>
                    <input class="star star-3" type="radio" id="star3" name="rating" v-model="rating" :value="3"/>
                    <label class="star star-3" for="star3"></label>
                    <input class="star star-2" type="radio" id="star2" name="rating" v-model="rating" :value="2"/>
                    <label class="star star-2" for="star2"></label>
                    <input class="star star-1" type="radio" id="star1" name="rating" v-model="rating" :value="1"/>
                    <label class="star star-1" for="star1"></label>                    
                    <span class="text-danger text-center">{{ ratingError }}</span>                    
                </div>
            <form class="form-group">
                <textarea id="comment" class="form-control" v-model="message" placeholder="Your review"></textarea>
                <button class="review-submit-btn" type="button" @click="productReview()">
                    Submit Your Review
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props:['product'],
    data() {
        return {
            message: '',
            rating: '',
            ratingError: '',
            errorCount: 0,
        }
    },

    methods: {
        resetError(){
            this.errorCount = 0
            this.ratingError = ''
        },
        validation(){
            if (this.rating.length === 0) {
                this.ratingError = 'Please select a rating'
                this.errorCount++
            }
        },
        productReview(){
            this.resetError()
            this.validation()
            axios.post('/product/review', {
                product_id: this.product.id,
                user_id:this.$authUserId,
                rating: this.rating,
                message: this.message,
            })
            .then(response => {
                if(response.status == 200){
                    Reload.$emit('productReview');
                    flash('Product rating has been successfully added.', 'success');
                    this.rating = ''
                    this.message = ''
                }
            }).catch(error => {
                if(error.response.status == 422){
                    if (error.response.data.rating && error.response.data.rating.length > 0) {
                        this.ratingError = error.response.data.rating[0]
                    }
                }
            })
        }
    },
}
</script>