<template>
  <div>
    <v-row align="center">
      <v-col
          cols="3"
          class="ml-15"
      >
        <v-img
            class="mt-10 ml-5"
            style="cursor: pointer"
            @click="$router.push('/CourseView')"
            max-height="70px"
            max-width="70px"
            :src="require('../assets/back_row.svg')"
        >

        </v-img>
      </v-col>
      <v-col cols="1"/>
      <v-col cols="4">
        <h1 class="pt-8">Редактирование курса</h1>
      </v-col>
      <v-col cols="4"/>
    </v-row>

    <v-form class="" style="margin-top: 100px;">
      <v-row align="center" justify="space-around">
        <v-col cols="3">
          <h3>Обложка курса</h3>
          <v-file-input
              label="Загрузите файл"
              accept=".png"
          />
        </v-col>

        <v-col cols="4">
          <h3>Обложка курса</h3>
          <v-text-field/>
        </v-col>

        <v-col cols="3">
          <h3>Обложка курса</h3>
          <v-text-field/>
        </v-col>

      </v-row>
    </v-form>

  </div>
</template>

<script>
export default {
  name: "CourseEditorView",
  data() {
    return {

    }
  },
}
</script>

<style scoped>

</style>