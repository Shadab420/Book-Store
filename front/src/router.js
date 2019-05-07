import Bookself from './components/Bookself'
import Categories from './components/Categories'
import Writers from './components/Writers'
import Register from './components/auth/Registration'
import Login from './components/auth/Login'

export const routes = [

	{
		path: '/',
		component: Bookself
	},

	{
		path: '/register',
		component: Register,
	},

	{
		path: '/login',
		component: Login,
	},

	{
		path: '/categories',
		component: Categories
	},

	{
		path: '/writers',
		component: Writers
	}


]