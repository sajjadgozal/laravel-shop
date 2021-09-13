<template>
      <v-navigation-drawer
        app
        permanent
        expand-on-hover
      >
        <v-list>
          <v-list-item class="px-2">
            <v-list-item-avatar>
              <v-img src="https://randomuser.me/api/portraits/women/85.jpg"></v-img>
            </v-list-item-avatar>
          </v-list-item>

          <v-list-item link>
            <v-list-item-content>
              <v-list-item-title class="text-h6">
                Sandra Adams
              </v-list-item-title>
              <v-list-item-subtitle>sandra_a88@gmail.com</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>

        <v-list
          nav
          dense
        >
            <v-list-item v-for="(item, i) in menu" :key="i" link :href=item.path>
                <v-list-item-icon>
                    <v-icon v-text="item.icon"></v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title
                        v-text="item.title"
                    ></v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>



        

      </v-navigation-drawer>



</template>

<script>
import Logo from './logo'

export default {
    data() {
        return {
            menu: [
                { title: "Dashboard", icon: "mdi-view-dashboard" , path: route('dashboard')},
                { title: "categories", icon: "mdi-bell" , path: route('category.index')},
                { title: "Products", icon: "mdi-cart" , path: route('product.index')},
                { title: "Discounts", icon: "mdi-star" , path: route('discount.index')},
            ]
        };
		},
		
		components: {
			Logo
		}
};
</script>
