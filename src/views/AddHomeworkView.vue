<template>
  <div>
    <HeaderComp title="Добавление домашнего задания" link="/CourseView"/>
    <v-form>
      <v-row>
        <v-col class="ml-15 mt-16" cols="5">
          <v-switch
              class="ml-10"
              color="info"
              label="Опубликовать сразу"
              v-model="newHomeWork.publicate"
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
              hide-details="auto"

          >

          </v-file-input>

          <v-file-input
              class="mt-5"
              label="Дополнительные файлы задания"
              hide-details="auto"
          >

          </v-file-input>
        </v-col>

        <v-spacer/>

        <v-col class="mt-16 mr-16" cols="5">
          <h2 class="text_area">Текст задания</h2>
          <v-textarea class="mt-15"
            v-model="newHomeWork.homeWorkText"
          />
          <v-row class="mt-2" justify="space-around">
            <v-btn color="primary">Опубликовать</v-btn>
            <v-btn color="error">Отменить</v-btn>
          </v-row>
        </v-col>


      </v-row>
  </v-form>

  </div>
</template>

<script>
import HeaderComp from "@/components/HeaderBackRowComp";
export default {
  name: "AddHomework",
  components: {
    HeaderComp
  },
  data() {
    return {
      newHomeWork: {
        publicate: true,
        homeworkName: "",
        homeWorkText: ""
      },
      inputHomeworkRules: [
        value => !!value || 'Введите название',
        value => (value && value.length >= 3) || 'Название должно содержать больше 3 символов',
        value => (value && value.length >= 3) || 'Название должно содержать меньше 10 символов'
      ]
    }
  },
}
</script>

<style scoped>
.text_area {
  margin-left: 200px;
}
</style>
