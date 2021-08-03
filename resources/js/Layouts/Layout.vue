<template>
<v-app>

    <navigation-drawer/>

    <app-bar/>

    <!-- Sizes your content based upon application components -->
    <v-main>

        <!-- Provides the application the proper gutter -->
        <v-container fluid>
            <slot></slot>
        </v-container>
            
    </v-main>

    <footer-bar/>

    <flash-massages v-if="$page.props.flash.message">
        {{ $page.props.flash.message }}
    </flash-massages>

    
</v-app>

</template>

<script>
    import NavigationDrawer from '@/Components/NavigationDrawer'
    import AppBar from '@/Components/AppBar'
    import FooterBar from '@/Components/FooterBar'
    import FlashMassages from "../Components/FlashMassage";

    export default {

        data() {
            return {
                //
            };
        },

        components: {
            NavigationDrawer,
            AppBar,
            FooterBar,
            FlashMassages
        }
    }
</script>
