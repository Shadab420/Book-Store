import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)


export default new Vuex.Store({

	state:{
		books:[],
		cart:[],
        authUser:null
	},

	getters:{

		getBooksInventory(state){
            return state.books
        },

        getCart(state){
            return state.cart
        },

        getAuthUser(state){
            return state.authUser
        }

	},

	mutations:{
        setAuthUser(state, user){
            state.authUser = user
        },

		setBooksInventory(state, items){
            state.books = items
         },

        addToCart(state, item){
            state.cart.push(item)
        },

        removeItemFromCart(state, index){
            state.cart.splice(index,1)
        },

        clearCart(state){
            state.cart = []
        }
	},

	actions:{
        setAuthUser(context, user){
            context.commit('setAuthUser', user)
        },

        addToCart(context, item){
            context.commit('addToCart', item)
        },

        removeItemFromCart(context, index){
        	context.commit('removeItemFromCart', index)
        },

        clearCart(context){
        	context.commit('clearCart')
        }
    }

})