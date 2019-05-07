<template>
<!-- Team -->
	<div class="row bookself">
                      <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" v-for="book in books">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" :src="book.coverImg"></p>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">{{ book.title }}</h4>
                                    <h6 class="card-title">{{ book.author.fullname }}</h6>
                                    <!-- <p class="card-text"> {{ book.description }} </p> -->
                                    <p class="card-text"> {{ book.category.catName }} </p>

                                    <p class="card-text"> {{ book.publication.pubName }} </p>
                                    <h6>Price: {{ book.price }} BDT.</h6>
                                    <!-- <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <button class="btn btn-primary" href="#" title="view details">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </li>
                                        <li class="list-inline-item">
                                            <button class="btn btn-success add-to-cart" href="#" title="add to cart" @click="addToCart(book)">
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        </li>
                                        <li class="list-inline-item">
                                            <button id="" class="btn btn-warning" href="#" title="Add to wishlist" >
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </li>
                                    </ul> -->

                                    <div class="myRow">
                                        <div class="col-sm-4">
                                            <button class="btn btn-primary" href="#" title="view details" data-toggle="modal" data-target="#bookDetails" @click="showDetails(book)">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-success add-to-cart" href="#" title="add to cart" @click="addToCart(book)">
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button id="" class="btn btn-warning" href="#" title="Add to wishlist" >
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="../assets/img/bookrack.png" height="11em" width="100%">
            </div>

            <div class="modal fade" id="bookDetails" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg mDialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Book Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- <img src="../assets/img/cardBackground.jpg"> -->
                            <div v-if="currBook">
                                <div  class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-4">
                                            <img :src="currBook.coverImg" class="coverImg">
                                            
                                        </div>

                                        <div class="col-md-8">
                                            <div class="col-md-12">
                                                <p><b>Title:</b> {{ currBook.title }}</p>
                                                <p><b>Author:</b> {{ currBook.author.fullname }}</p>
                                                <p><b>Price: </b>{{ currBook.price }}</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <hr>

                                <div  class="row">
                                    <div class="col-md-12">
                                        <p><b>Description:</b></p>
                                        <p>{{ currBook.description }}</p>
                                    </div>
                                </div>
                                    
                                    
                            </div>
                            
                        </div>
                            

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                        </div>
                    </div>
                </div>
            </div>


</div>
            
		
</template>

<script>
	
	export default{

        data(){
            return{
                currBook: null
            }
        },


		mounted(){

			
			this.$http.get('api/books').then(response=>{

				this.$store.commit('setBooksInventory',  response.body)
				// console.log(this.books)
			})

		},

		computed: {

			books(){
				return this.$store.getters.getBooksInventory
			}
		},

		methods: {

            showDetails(currBook){
                this.currBook = currBook
                // jQuery('#bookDetails').modal('show');
            },

			addToCart(book){
				this.$store.dispatch('addToCart', book)
			}
			
		}

		

	}

</script>

<style>
	/* FontAwesome for working BootSnippet :> */

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

.bookself{
	height: 800px;
	overflow-y: scroll;
}

#team {
    /*background: #eee !important;*/
    background: url('../assets/img/bookselfTexture.jpg');
    margin-top: 10em;
    
    border: 2px solid #ffefb5;
}

/*.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}*/

/*.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}*/



#team .card {
    border: none;
    background: transparent;
}


.image-flip:hover .backside{
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    border-radius: .25rem;
}

.flip-0{
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
}

.image-flip:hover .frontside{
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);

  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);

}

.flip-180{
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
}

.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
    /*background: #FFFFA5;*/
    -webkit-transform:scale(1.1);
    -moz-transform:scale(1.1);
    -o-transform:scale(1.1);
    -ms-transform:scale(1.1);
    transform:scale(1.1);
}

.backside {
    position: absolute;
    top: 0;
    left: 10%;
    /*background: white;*/
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    /*-webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    margin-bottom: 1em;*/
}



.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;

}

.frontside .card,
.backside .card {
    min-height: 280px;
    border-radius: 5%;

}

.backside .card:hover{
	box-shadow: 0 0 10px #fff,
                  0 0 30px #ccffcc,
                  0 0 20px #ccffcc,
                  0 0 60px #002856;
                  transition: all 0.1s;
}

.backside .card a {
    font-size: 18px;
    color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 160px;
    height: 200px;
    border-radius: 5%;
    margin-top: 2em;
}

.backside .card{
    background: #FFFFA5 !important;
    width: 200px;
    margin-top: 10%;
}

.backside .card .myRow{
    padding-right: 10%;
}

.mDialog{
    left: 0;
}

.coverImg{
        width: 165px;
        height: 195px;

        display: block;
        margin-left: auto;
        margin-right: auto;
}

hr { 
  height: 30px; 
  border-style: solid; 
  border-color: #8c8b8b; 
  border-width: 1px 0 0 0; 
  border-radius: 20px; 
}

hr:before { 
  display: block; 
  content: ""; 
  height: 30px; 
  margin-top: -31px; 
  border-style: solid; 
  border-color: #8c8b8b; 
  border-width: 0 0 1px 0; 
  border-radius: 20px; 
}

@media only screen and (max-width: 580px){
    .frontside{
        -webkit-transform:scale(0.95);
        -moz-transform:scale(0.95);
        -o-transform:scale(0.95);
        -ms-transform:scale(0.95);
        transform:scale(0.95);
        min-height: 330px;
    }
    .backside {
        top: 6%;
        left: 3%;
    }

    .frontside .card .card-body img {
        width: 220px;
        height: 270px;
        margin-top: 2em;
    }

    .coverImg{
        margin-bottom: 5%;
    }
}

@media only screen and (max-width: 520px){

    .backside{
        left: 25%;
    }

}

@media only screen and (max-width: 435px){

    .backside{
        left: 15%;
    }

}

@media only screen and (max-width: 400px){

    .backside{
        left: 10%;
    }

}



</style>