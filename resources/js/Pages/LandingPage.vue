<template>

        <div class="py-12">

            <!-- Authentication -->
            <form @submit.prevent="logout">

                <input type="submit" value="Logout">
            </form>

            <Link :href="$route('cart')"  preserve-scroll >Cart</Link>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    hello world
                </div>
            </div>

            <ul>
                <template v-for="product in products">
                    <li>{{ product.name }}</li>
                    <Link :href="$route('addToCart' , product.id )"  preserve-scroll >add to cart</Link>
                    <v-divider inset ></v-divider>
                </template>
            </ul>

        </div>
</template>

<script>
    import layout from '@/Layouts/Layout'
    import { Link } from '@inertiajs/inertia-vue'

    console.log( route( "addToCart" , 1 )  )

    export default {

        components: {
            layout,
            Link
        },

        props: ["products", "errors"],

        data() {
            return {}
        },

        methods:{
            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
