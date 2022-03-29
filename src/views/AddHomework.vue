<template>
  <div>

    <v-row>
      <v-col cols="1"/>
      <v-col
          cols="3"
      >
        <v-img
            class="mt-10"
            style="cursor: pointer"
            @click="$router.push('/CourseView')"
            max-height="70px"
            max-width="70px"
            :src="require('../assets/back_row.svg')"
        >

        </v-img>
      </v-col>
    </v-row>

    <v-col class="ml-15 mt-16">
      <v-form>
        <v-switch
            color="info"
            label="Опубликовать сразу"
            v-model="publicate"
        >

        </v-switch>
      </v-form>
    </v-col>

    <v-col></v-col>

    <v-col></v-col>

  </div>
</template>

<script>
export default {
  name: "AddHomework",
  data() {
    return {
      publicate: false
    }
  },
}
</script>

<style scoped>

</style>