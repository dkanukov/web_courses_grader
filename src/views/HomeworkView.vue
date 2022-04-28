<template>
  <div>
    <HeaderComp title="Добавление домашнего задания" link="/CourseView"/>
    <v-form>
      <v-row>
        <v-col class="ml-15 mt-16" cols="5">

          <v-text-field
              class="ml-10"
              label="Название домашнего задания"
              v-model="newHomeWork.homeworkName"
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
              label="Дополнительные файлы задания"
          >

          </v-file-input>

          <v-textarea class="mt-5 ml-10"
                      label="Дополнительный текст домашнего задания"
                      v-model="newHomeWork.homeWorkText"
          />
          <v-row justify="space-around">
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
