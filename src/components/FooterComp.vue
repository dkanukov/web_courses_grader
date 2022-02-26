<template>
  <v-footer class = "vfooter">
    <v-card
      elevation="0"
      rounded="0"
      width="100%"
      class="text-center bg-cyan-accent-4"
    >
      <v-card-text>
        <v-btn
          class="mx-4"
          icon="mdi-home"
          variant="plain"
        ></v-btn>
        <v-btn
          class="mx-4"
          icon="mdi-email"
          variant="plain"
        ></v-btn>
        <v-btn
          class="mx-4"
          icon="mdi-calendar"
          variant="plain"
        ></v-btn>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="text-white">
        {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<style lang="css" scoped>
.vfooter {
	margin-top: 100px;
	padding: 0;
}
</style>
