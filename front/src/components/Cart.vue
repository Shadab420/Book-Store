<template>
	<div class="row container cart">
	<div class="cart-list animated zoomIn col-xs-12 col-sm-12 col-md-12 col-lg-12" id="cart-list">
		<h3 v-if="items.length > 0">Cart Items </h3>
		<h3 v-else> Cart is empty! </h3>

		
		
		
			<div  v-for="(item,index) in items">

				<ul class="list-group">
				  <li class="list-group-item">
				  	<div class="row">
				  		<div class="col-md-4">
				  			<img :src="item.coverImg" class="cartCoverImg">
				  		</div>
				  		<div class="col-md-8">
				  			<div class="row">
				  				<div class="col-md-12">
				  					<p>
				  						{{ item.title }}
				  					</p>
				  				</div>
				  				<div class="col-md-12">
				  					<p>
				  						{{ item.author.fullname }}
				  					</p>
				  				</div>
				  				<div class="col-md-12">
				  					<p>Price: {{ item.price }} BDT.</p>
				  				</div>
				  			</div>
				  			<button class="btn btn-danger pull-right" @click="removeItem(index)"><span class="fa fa-remove"></span></button>
				  		</div>
				  	</div>

				  	
				  	
				  	
				  </li>
				  
				</ul>
				
			
				

			
		</div>
	</div>
	
		
	</div>	
	
</template>

<script>

	export default{

		computed:{
			items(){
				return this.$store.getters.getCart
			}
		},

		methods:{

			removeItem(index){
	          // this.$emit('cartItemRemoved', index)
	          this.$store.dispatch('removeItemFromCart', index)
	        },

	        
		}

		
	}
	
</script>

<style>

	
	.cart-list{
		background: #fff;
		overflow-y: scroll;
		height: 363px;
	}

	.cartCoverImg{
		width: 75px;
		height: 105px;
		
	}

	.cart-book-title{

	}

	
	
</style>