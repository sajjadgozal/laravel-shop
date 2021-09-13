<template>
      <v-navigation-drawer
        app
        permanent
        expand-on-hover
      >
        <v-list>
          <v-list-item class="px-2">
            <v-list-item-avatar>
<!--                 <v-img src="https://randomuser.me/api/portraits/women/85.jpg"></v-img>-->
                <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
            </v-list-item-avatar>
          </v-list-item>

          <v-list-item v-bind:href="route('profile.show')">
            <v-list-item-content>
              <v-list-item-title class="text-h6">
                  {{ $page.props.user.name }}
              </v-list-item-title>
              <v-list-item-subtitle>
                  {{ $page.props.user.email }}
              </v-list-item-subtitle>
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
