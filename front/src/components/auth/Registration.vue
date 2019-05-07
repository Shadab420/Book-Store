<template>

	<div class="regContainer" style="height: 100%;">
	<!---heading-->
     <header class="heading"> Registration-Form</header><hr></hr>
	<!---Form starting--> 
	<div class="row ">
	 <!--- For Name-->
         <div class="col-sm-12">
             <div class="row">
			     <div class="col-xs-4">
          	         <label class="firstname">First Name :</label> </div>
		         <div class="col-xs-8">
		             <input type="text" name="fname" id="fname" placeholder="Enter your First Name" class="form-control inputStyle" v-model="user.first_name">
             </div>
		      </div>
		 </div>
		 
		 
         <div class="col-sm-12">
		     <div class="row">
			     <div class="col-xs-4">
                     <label class="lastname">Last Name :</label></div>
				<div class ="col-xs-8">	 
		             <input type="text" name="lname" id="lname" placeholder="Enter your Last Name" class="form-control last inputStyle"v-model="user.last_name">
                </div>
		     </div>
		 </div>

		 <!-- for address -->
		 <div class="col-sm-12">
		     <div class="row">
			     <div class="col-xs-4">
                     <label class="lastname">Address :</label></div>
				<div class ="col-xs-8">	 
		             <textarea id="address" class="form-control address inputStyle" v-model="user.address"></textarea> 
                </div>
		     </div>
		 </div>

		 <!-- for mobile -->
		 <div class="col-sm-12">
		     <div class="row">
			     <div class="col-xs-4">
                     <label class="lastname">Mobile :</label></div>
				<div class ="col-xs-8">	 
		             <input type="text" name="mobile" id="mobile" placeholder="Enter your mobile no." class="form-control last inputStyle"v-model="user.mobile">
                </div>
		     </div>
		 </div>

     <!---For email-->
		 <div class="col-sm-12">
		     <div class="row">
			     <div class="col-xs-4">
		             <label class="mail" >Email :</label></div>
			     <div class="col-xs-8"	>	 
			          <input type="email" name="email"  id="email"placeholder="Enter your email" class="form-control inputStyle" v-model="user.email">
		         </div>
		     </div>
		 </div>
	 <!---For Password and confirm password-->
          <div class="col-sm-12">
		         <div class="row">
				     <div class="col-xs-4">
		 	              <label class="pass">Password :</label></div>
				  <div class="col-xs-8">
			             <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control inputStyle" v-model="user.password">
				 </div>
          </div>
		  </div>

		  <div class="col-sm-12">
		         <div class="row">
				     <div class="col-xs-4">
		 	              <label class="pass">Confirm Password :</label></div>
				  <div class="col-xs-8">
			             <input type="password" name="password" id="confirmPassword" placeholder="Enter your Password" class="form-control inputStyle" v-model="confirmPass">
				 </div>
          </div>
		  </div>
		  
     <!--For Phone number-->
         <div class="col-sm-12">
		     <div class ="row">
                 <div class="col-xs-4 ">
			       <label class="gender">Gender:</label>
				 </div>
			 
			     <div class="col-xs-2 male">	 
				     <input type="radio" name="gender"  id="gender" value="male" v-model="user.gender">Male</input>
				 </div>
				 
				 <div class="col-xs-2 female">
				     <input type="radio"  name="gender" id="gender" value="female" v-model="user.gender">Female</input>
			     </div>
			
		  	 </div>
		     <div class="col-sm-12">
		         <div class="btn btn-warning" @click="registerUser">Submit</div>
		   </div>
		 </div>
	 </div>	 

	 </div>
	
</template>

<script>

	export default{

		data(){
			return{


				user:{

					first_name: "",
					last_name: "",
					address: "",
					email: "",
					password: "",
					gender: "",
					mobile: ""

				},
				confirmPass: "",
				
			}
		},

		methods:{

			registerUser(){
				this.$http.post('api/registration/', this.user).then(response=>{

					console.log(response.body);

				})
			}
		}

	}
</script>

<style>

/*-----for border----*/
.regContainer{
	font-family:Roboto,sans-serif;
	  background-image:url(https://image.freepik.com/free-vector/dark-blue-blurred-background_1034-589.jpg) ;
    
     border-style: 1px solid grey;
     margin: 0 auto;
     text-align: center;
     opacity: 0.8;
   	 box-shadow: 2px 5px 5px 0px #eee;
     max-width: 500px;
     padding-top: 10px;
     margin-top: 50px;

}

/*for all input fields*/
.inputStyle{
	width: 95%;
	margin-top: 5px;
}
/*--- for label of first and last name---*/
.lastname{
	 margin-left: 1px;
     font-family: sans-serif;
     font-size: 14px;
     color: white;
     margin-top: 10px;
}
.firstname{
	 margin-left: 1px;
     font-family: sans-serif;
     font-size: 14px;
     color: white;
     margin-top: 5px;
}
#lname{
	 margin-top:5px;
}

/*for address*/
.address{
	height: 40px;
	margin-top: 5px;
}
	  

/*---for heading-----*/
.heading{
	 text-decoration:bold;
	 text-align : center;
	 font-size:30px;
	 color:#F96;
	 /*padding-top:10px;*/
}
/*-------for email----------*/
  /*------label----*/
#email{
	  margin-top: 5px;
}
/*-----------for Password--------*/
     /*-------label-----*/
.mail{
	 margin-left: 44px;
     font-family: sans-serif;
     color: white;
     font-size: 14px;
     margin-top: 13px;
}
.pass{
	 color: white;
     margin-top: 9px;
     font-size: 14px;
     font-family: sans-serif;
     margin-left: 6px;
     margin-top: 9px;
}
#password, #confirmPassword{
 margin-top: 6px;
}
/*------------for phone Number--------*/
      /*----------label--------*/
.pno{
	 font-size: 18px;
     margin-left: -13px;
     margin-top: 10px;
     color: #ff9;
	
}	

/*--------------for Gender---------------*/
     /*--------------label---------*/
.gender {
	 color: white;
     font-family: sans-serif;
     font-size: 14px;
     margin-left: 28px;
     margin-top: 8px;
}

     /*---------- for Input type--------*/
.col-xs-4.male{
	 color: white;
     font-size: 13px;
     margin-top: 9px;
     padding-bottom: 16px;
}
.col-xs-4.female {
     color: white;
     font-size: 13px;
     margin-top: 9px;
     padding-bottom: 16px;
	 padding-right: 95px;
}	
/*------------For submit button---------*/
.sbutton{
	 color: white;
     font-size: 20px;
     border: 1px solid white;
     background-color: #080808;
     width: 32%;
     margin-left: 41%;
     margin-top: 16px;
	 box-shadow: 0px 2px 2px 0px white;

  	   
   }

   .btn.btn-warning{
   		margin-bottom: 10%;
   }
.btn.btn-warning:hover {
    box-shadow: 2px 1px 2px 3px #99ccff;
	background:#5900a6;
	color:#fff;
	transition: background-color 1.15s ease-in-out,border-color 1.15s ease-in-out,box-shadow 1.15s ease-in-out;
	
}	 

	
</style>