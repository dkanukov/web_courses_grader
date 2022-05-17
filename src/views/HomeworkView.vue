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
              :rules="inputHomeworkRules">
          </v-text-field>

          <v-file-input
              class="mt-15"
              label="Тесты для проверки">
          </v-file-input>

          <v-file-input
              class="mt-5"
              label="Дополнительные файлы задания">
          </v-file-input>

          <v-textarea class="mt-5 ml-10"
                      label="Дополнительный текст домашнего задания"
                      v-model="newHomeWork.homeWorkText"/>

          <v-row justify="space-around">
            <v-btn color="primary">Опубликовать</v-btn>
            <v-btn color="error">Отменить</v-btn>
          </v-row>
        </v-col>

        <v-spacer/>

        <v-col cols="5">
          <draggable
              class="mt-16"
              :list="courseTasks.tasks"
              item-key="element.id"
              @start="dragging = true"
              @end="dragging = false">
              <template #item="{element}">
                <div class="dragndrop_item mt-10" style="border-radius: 10px">
                  <h3>{{element.name}}</h3>
                </div>
              </template>
          </draggable>
            <v-btn block="block">Сохранить изменения</v-btn>
            <v-btn block="block">Отменить</v-btn>
        </v-col>

      </v-row>
  </v-form>

  </div>
</template>

<script>
import HeaderComp from "@/components/HeaderBackRowComp";
import {getTasksByCourseId} from "@/services/fetchers";
import draggable from "vuedraggable"
export default {
  name: "AddHomework",
  components: {
    HeaderComp,
    draggable
  },
  data() {
    return {
      block: true,
      newHomeWork: {
        homeworkName: "",
        homeWorkText: ""
      },
      courseTasks: [],
      inputHomeworkRules: [
        value => !!value || 'Введите название',
        value => (value && value.length >= 3) || 'Название должно содержать больше 3 символов',
        value => (value && value.length >= 3) || 'Название должно содержать меньше 10 символов'
      ],
      dragging: false,
    }
  },
  methods: {
    async getTasks() {
      this.courseTasks = await getTasksByCourseId(window.localStorage.getItem("recentlyVisitedCourse"));
    }
  },
  mounted() {
    this.getTasks();
  }
}
</script>

<style scoped>
.dragndrop_item {
  max-width: 300px;
  text-align: center;
  background-color: cornflowerblue;
}

</style>
