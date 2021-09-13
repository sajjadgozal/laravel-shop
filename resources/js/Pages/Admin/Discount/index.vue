<template>
    <layout>
        <v-data-table
            :headers="headers"
            :items="discounts"
            sort-by="name"
            class="elevation-1"
        >
            <template v-slot:top>
                <v-toolbar flat>
                    <v-toolbar-title>Discounts</v-toolbar-title>
                    <v-divider class="mx-4" inset vertical></v-divider>

                    <v-spacer></v-spacer>

                    <v-dialog v-model="createDialog" max-width="500px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                                color="green lighten-2"
                                elevation="2"
                                small
                                dark
                                v-bind="attrs"
                                v-on="on"
                            >
                                New Discount
                            </v-btn>
                        </template>
                        <create-form
                            v-on:close-dialog="createDialog = false"
                            :errors="errors"
                        />
                    </v-dialog>

                    <v-dialog v-model="editDialog" width="500">
                        <edit-form
                            v-bind:item="selectedItem"
                            v-on:close-dialog="editDialog = false"
                            v-on:errors="errors"
                        />
                    </v-dialog>

                    <v-dialog v-model="deleteDialog" max-width="500px">
                        <dellete-form
                            v-bind:delleteRoute="delleteRouteName"
                            v-bind:item="selectedItem"
                            v-on:close-dialog="deleteDialog = false"
                            v-on:errors="errors"
                        />
                    </v-dialog>
                </v-toolbar>
            </template>

            <template v-slot:item.actions="{ item }">
                <v-icon small class="mr-2" v-on:click="editItem(item)">
                    mdi-pencil
                </v-icon>

                <v-icon small v-on:click="deleteItem(item)">
                    mdi-delete
                </v-icon>
            </template>

            <template v-slot:no-data>
                <v-btn color="primary">
                    Reset
                </v-btn>
            </template>
        </v-data-table>
    </layout>
</template>

<script>
import layout from "@/Layouts/Layout";
import delleteForm from "@/Components/DelleteForm";
import editForm from "./edit";
import createForm from "./create";

export default {
    components: {
        layout,
        editForm,
        createForm,
        delleteForm
    },

    props: ["discounts", "errors"],

    data: () => ({
        createDialog: false,
        deleteDialog: false,
        editDialog: false,
        delleteRouteName: "discount.destroy",
        headers: [
            {
                text: "Name",
                align: "start",
                sortable: true,
                value: "name"
            },
            {
                text: "Description",
                value: "description"
            },
            {
                text: "Code",
                value: "code"
            },
            {
                text: "Present",
                value: "present"
            },
            {
                text: "user",
                value: "created_by_id"
            },
            { text: "Actions", value: "actions", sortable: false }
        ],

        selectedItem: {}
    }),

    methods: {

        editItem(item) {
            this.selectedItem = Object.assign({}, item);
            this.editDialog = true;
        },

        deleteItem (item) {
          this.selectedItem = Object.assign({}, item)
          this.deleteDialog = true
        },

    }
};
</script>
