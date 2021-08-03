<template>
    <v-snackbar
      v-model="snackbar"
      :timeout="timeout"
    >
      <slot></slot>
      <template v-slot:action="{ attrs }">
        <v-btn
          color="blue"
          text
          v-bind="attrs"
          @click="snackbar = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
</template>

<script>

  export default {

    data: () => ({
      snackbar: true,
      timeout: 1000,
    }),
  }
</script>

<style>

</style>