<template>
    <v-card>
        <v-card-title class="text-h5"
            >Are you sure you want to delete this item?</v-card-title
        >
        <v-card-actions>
            <v-spacer></v-spacer>

            <v-btn
                color="blue darken-1"
                text
                v-on:click="$emit('close-dialog')"
            >
                Cancel
            </v-btn>

            <v-btn color="blue darken-1" text v-on:click="submit">
                OK
            </v-btn>

            <v-spacer></v-spacer>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    
    props: ["item", "delleteRoute", "errors"],

    methods: {
        submit: function() {
            this.$inertia.delete(route( this.delleteRoute, this.item.id), {
                onSuccess: () => {
                    this.$emit("close-dialog");
                }
            });
        }
    }
};
</script>
