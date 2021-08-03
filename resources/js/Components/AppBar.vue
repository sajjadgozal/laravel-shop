<template>
    <v-app-bar
      absolute
      color="lighten-3"
      dark
      hide-on-scroll
      prominent
      app
    >
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-toolbar-title>
          Title
      </v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-heart</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-app-bar>

</template>
	
<script>
import AppLayout from "../Layouts/AppLayout"

export default {

	components: {
		AppLayout,
	}
};
</script>
