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
          <v-row justify="center" class="mb-5">
            <h2>Обложка курса</h2>
          </v-row>
          <v-file-input
              label="Загрузите файл .png"
              accept=".png"
          />
        </v-col>

        <v-col cols="4">
          <v-row justify="center" class="mb-5">
            <h2>Описание курса</h2>
          </v-row>
          <v-text-field v-model="editedCourse.courseDescr"/>
        </v-col>

        <v-col cols="3">
          <v-row justify="center" class="mb-5">
            <h2>Изменить почту</h2>
          </v-row>
          <v-text-field/>
        </v-col>
      </v-row>

      <v-row class="mt-10">
        <v-spacer/>
        <v-col cols="4">
          <v-row justify="space-around">
              <v-btn
                  x-large
                  color="primary"
              >
                Сохранить
              </v-btn>
            <v-btn
                x-large
                color="error"
            >
              Отменить
            </v-btn>
          </v-row>
        </v-col>
        <v-spacer/>
      </v-row>
    </v-form>

  </div>
</template>

<script>
export default {
  name: "CourseEditorView",
  data() {
    return {
      editedCourse: {
        courseDescr: ""
      }
    }
  },
}
</script>

<style scoped>

</style>