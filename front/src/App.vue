<template>
  <div id="app">
    <div class="row">
      <navbar> </navbar>
    </div>
    

    
    
      <!-- <router-link :to="{ path: '/bookself' }">nav</router-link> -->



      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">

          <section id="team" class="pb-5">
            <div class="tabDiv">
              <button class="btn"><router-link :to="{ path: '/' }">All Books</router-link></button>

              <button class="btn"><router-link :to="{ path: '/categories' }">Categories</router-link> </button>

              <button class="btn"><router-link :to="{ path: '/writers' }">Writers</router-link> </button>
            </div>


            

              <router-view></router-view>
                
           

          </section>

        </div>

        <!-- Registration Modal -->

        <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg mDialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Book Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <registration></registration>
                            
                        </div>


                            

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Login Modal -->

        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg mDialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <login></login>
                            
                        </div>
                            

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Main Contents -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          
          <div id="toReplace" class="cart-btn">
              <div :is="currentComponent" class="currComponent">
                
              </div>
              
                <totalBill></totalBill>
              
              
              <div v-show="!currentComponent" class="cart-opcl-btn">
                <button class="btn btn-primary" @click="swapComponent('cart')"><i class="fa fa-shopping-cart"></i>Show Cart</button>
              </div>

              <div class="cart-opcl-btn">
                <button v-if="currentComponent" class="btn btn-danger" @click="swapComponent(null)"><i class="fa fa-shopping-cart"></i>Close Cart</button>
              </div>
              
          </div>
              
        </div>

      </div>  

      <!-- Footer -->
      <div class="row">
        <myfooter></myfooter>
      </div>
      

      <p><a href="https://www.fg-a.com/backgrounds_animated.shtml">Free Animated Backgrounds</a></p>



  </div>

 
</template>

<script>

import Navbar from './components/Navbar'
import Registration from './components/auth/Registration'
import Login from './components/auth/Login'
import MyFooter from './components/MyFooter'
import Cart from './components/Cart'
import TotalBill from './components/TotalBill'

export default {

  data(){

      return {
          currentComponent: null,
        }

    },

  components: {

    navbar: Navbar,
    registration: Registration,
    login: Login,
    myfooter: MyFooter,
    cart: Cart,
    totalBill: TotalBill

  },

  methods:{
      swapComponent: function(component)
      {
        this.currentComponent = component;
      },

      
  },

  

}
</script>

<style>
#app{

  background: url('./assets/img/bodyBackground.gif');

}

.content-row{
 
  
}

section {
  margin: 1%;
  /*border-radius: 5%;*/
}

section .section-title {
  text-align: center;
  color: #007b5e;
  margin-bottom: 50px;
  text-transform: uppercase;
}

.tabDiv{
  background-color: #fff;
  padding: 1em;
  margin-bottom: 1em;
  border: 2px solid red;
  text-align: center;
}

.tabDiv a:hover{
  text-decoration: none;
}

.tabDiv button .router-link-active{
  background:red;
  color: white;
}

.container .offer{
  background: white;
}

.cart-btn{
    margin: 10em 0 0 0;
}

.currComponent{
  margin-left: 0.03em;
}

.cart-opcl-btn{
  padding-top: 0.5em;
  padding-left: 1.03em;
}

.mDialog{
    left: 0;
    width: auto;
    height: auto;
}

@media only screen and (max-width: 899px) {
  .cart-btn{
      margin: 10em 0 0 0;
  }
}

@media only screen and (max-width: 760px){
  .cart-btn{
      margin: 5em 0 5em 0;
  }
}




</style>
