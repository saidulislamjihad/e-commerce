<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>

<!-- Bootstap JS CDN -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- owl-crousel js -->
<script src="{{ asset('frontend/') }}/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
<!-- Main js -->
<script src="{{ asset('frontend/') }}/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function subcategory(id){
        console.log(id);
        axios.get('/subcategory/list/' + id)
            .then(response => {
                opt = '';
                opt += "<option value=''>Select a Subcategory</option>";
                for(let i = 0; i <= response.data.subcategories.length -1; i++){
                    opt += "<option value='"+ response.data.subcategories[i].id +"'>"+ response.data.subcategories[i].name +"</option>";
                }

                document.getElementById('sub_cat_id').innerHTML = opt;
            }).catch(error => {
                console.log(error);
            })
    }

    //Image preview
    function imagePreview(e){
        if (e.target.files[0]) {
            let image = e.target.files[0];
            if(image['type'] === 'image/jpeg' || image['type'] === 'image/png' || image['type'] === 'image/webp' || image['type'] === 'image/gif'){
                let reader = new FileReader();
                reader.onload = function ()
                {
                    let output = document.getElementById('pre-logo');
                    output.src = reader.result;
                    output.style.display = "block";
                    output.style.width = "25%";
                    output.style.height = "50%";
                    output.style.borderRadius = "100%";
                }
                reader.readAsDataURL(event.target.files[0]);
            }else{
                console.log("This file not an Image", 'Error !!');
            }
        }

    }
</script>


