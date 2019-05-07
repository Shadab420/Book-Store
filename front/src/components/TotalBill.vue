<template>
	<div class="container">
		<div class="row">
			<div class="bill col-xs-11 col-sm-11 col-md-11 col-lg-11">
				<div class="billElements">
					<div class="col-xs-6 col-md-8 col-lg-6 tbText">
						<p>Total Bill : {{ totalBill }} BDT. </p>
					</div>
					
					<div v-if="totalBill > 0" class="col-xs-5 col-sm-5 col-md-4 col-lg-4">

						<button class="btn btn-success">Purchase</button>
						
					</div>

					<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
						<button v-if="totalBill > 0" class="btn btn-danger pull-right" @click="emptyCart"><span class="fa fa-trash-o"></span></button>
					</div>
				</div>
				
				
			</div>
		</div>
		


	</div>
	
</template>


<script>

import swal from 'sweetalert2'

export default{

	computed:{
		items(){
			return this.$store.getters.getCart
		},

		totalBill(){

			var totPrice = 0
			this.items.forEach(item => {
				totPrice += parseFloat(item.price)
			})
			return totPrice.toFixed(2)
		}
		
	},

	methods:{
		emptyCart(){

				swal({
					  title: 'Are you sure?',
					  text: "You won't be able to revert this!",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, delete it!',
					  cancelButtonText: 'No, cancel!',
					  confirmButtonClass: 'btn btn-success',
					  cancelButtonClass: 'btn btn-danger',
					  buttonsStyling: false,
					  reverseButtons: true
					}).then((result) => {
					  if (result.value) {

					  	this.$store.dispatch('clearCart')

					    swal(
					      'Deleted!',
					      'Your file has been deleted.',
					      'success'
					    )
					  } else if (
					    // Read more about handling dismissals
					    result.dismiss === swal.DismissReason.cancel
					  ) {
					    swal(
					      'Cancelled',
					      'Your imaginary file is safe :)',
					      'error'
					    )
					  }
					})
	        	
	        }
	}

	

}
</script>

<style>
.bill{
	background: yellow;
	color: blue;
	font-style: bold;
	margin-left: 1.1em;
}

.billElements{

	margin: 1em 0 4em 0;

}

.tbText{
	background-color: blue;
	color: white;
	margin-bottom: 1%;
}

@media only screen and (max-width: 580px){

}

</style>