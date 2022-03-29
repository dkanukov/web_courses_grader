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

    <v-row>
      <v-col class="ml-15 mt-16">
        <v-form>
          <v-switch
              class="ml-10"
              color="info"
              label="Опубликовать сразу"
              v-model="publicate"
          >
          </v-switch>

          <v-text-field
              class="ml-10"
              label="Название домашнего задания"
              v-model="newHomeWork.homeworkName"
              hide-details="auto"
              :rules="inputHomeworkRules"
          >
          </v-text-field>

          <v-file-input
              class="mt-15"
              label="Тесты для проверки"
          >

          </v-file-input>

          <v-file-input
              class="mt-5"
            label="Дополнительные файлы"
          >

          </v-file-input>
        </v-form>
      </v-col>

      <v-col></v-col>

      <v-col></v-col>
    </v-row>

  </div>
</template>

<script>
export default {
  name: "AddHomework",
  data() {
    return {
      publicate: false,
      newHomeWork: {
        homeworkName: ""
      },
      inputHomeworkRules: [
          value => !!value || 'Введите название'
      ]
    }
  },
}
</script>

<style scoped>

</style>