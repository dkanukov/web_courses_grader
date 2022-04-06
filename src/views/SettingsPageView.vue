<template>
  <div>
    <v-row>
      <v-col
          cols="2"
          class="pt-10 pl-10"
      >
        <v-img
            style="cursor: pointer"
            @click="$router.push('/')"
            max-height="70"
            max-width="70"
            :src="require('../assets/back_row.svg')"
        ></v-img>
      </v-col>
      <v-spacer></v-spacer>
      <v-col
          cols="9"
          class="pt-10"
          align-self="center"
      >
        <h1>Добавление домашнего задания</h1>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: "SettingsPage"
}
</script>

<style scoped>

</style>
