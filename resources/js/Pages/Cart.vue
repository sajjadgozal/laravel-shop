<template>
    <div>
        <Link href="/"  preserve-scroll >cuntinue shopping </Link>
        <div>its a cart page</div>

        <ul >
            <li v-for="item in cart['products']" :key="item.id">
                {{ item.name }}
                {{ item.price }}
                {{ item.pivot.price }}
                <Link :href="$route('decreaseFromCart' , item.id )"  preserve-scroll >decrese</Link>
                {{ item.pivot.quantity }}
                <Link :href="$route('increaseInCart' , item.id )"  preserve-scroll >add</Link>
                <Link :href="$route('removeFromCart' , item.id )"  preserve-scroll >remove</Link>

            </li>
        </ul>

        <div>
            price: {{cart.totalPrice}}
            __ Quantity: {{cart.totalQuantity}}
        </div>

    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue'
import layout from "@/Layouts/Layout";


export default {

    props: ["cart", "errors"],

    components: {
        Link
    },

}
</script>
