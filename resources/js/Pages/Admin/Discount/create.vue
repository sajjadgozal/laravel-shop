<template>
    <v-card>
        <v-card-title class="text-h5">Edit Item</v-card-title>

        <v-card-text>
            <v-form v-model="form.valid" ref="form">
                <v-container>
                    <v-row>
                        <v-col cols="12" md="3">
                            <v-text-field
                                v-model="form.name"
                                :rules="form.nameRules"
                                :counter="20"
                                label="Name"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-text-field
                                v-model="form.code"
                                :counter="20"
                                label="Code"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-text-field
                                v-model="form.present"
                                :rules="form.PresentRules"
                                :counter="10"
                                label="Present"
                                required
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="12" md="4">
                            <v-text-field
                                v-model="form.description"
                                label="Description"
                                required
                            ></v-text-field>
                        </v-col>

                    </v-row>
                </v-container>
            </v-form>
        </v-card-text>

        <v-card-actions>
            <v-spacer></v-spacer>

            <v-btn color="blue darken-1" text v-on:click="submit(form)">
                Ok
            </v-btn>

            <v-btn color="blue darken-1" text v-on:click="$emit('close-dialog')">
                Cancel
            </v-btn>

            <v-spacer></v-spacer>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    props: ["errors"],

    data: () => ({
        form: {
            valid: false,
            name: "",
            present: "",
            description: "",
            code: "",
            user_id: 1,
            nameRules: [
                v => !!v || "Name is required",
                v => (v && v.length <= 30)|| "Name must be less than 10 characters"
            ],
            presentRules: [
                v => !!v || "Present is required"
                // v => /.+@.+/.test(v) || "E-mail must be valid"
            ]
        },
        editedItem: {
        },

    }),

    methods: {
        submit: function(data) {
            if (this.$refs.form.validate()) {
                this.$inertia.post(route("discount.store"), data, {
                    onSuccess: () => {
                        this.$refs.form.reset();
                        this.$emit("close-dialog");
                    },
                    errorBag: "createCompany"
                });
            }
        }
    }
};
</script>

<style></style>
