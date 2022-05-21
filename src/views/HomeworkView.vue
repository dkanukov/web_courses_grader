<template>
  <div>
    <HeaderComp title="Добавление домашнего задания" link="/CourseView"/>
    <v-form ref="form">
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
            <v-btn @click="publicate" color="primary">Опубликовать</v-btn>
            <v-btn @click="resetForm" color="error">Отменить</v-btn>
          </v-row>
        </v-col>

        <v-spacer/>

        <v-col cols="5">
          <draggable
              class="mt-16"
              item-key="element.id"
              v-model="courseTasks.tasks"
              @start="dragging = true"
              @end="dragging = false">
              <template #item="{element}">
                <div class="dragndrop_item mt-10" style="border-radius: 10px">
                  <h3>{{element.name}}</h3>
                </div>
              </template>
          </draggable>
            <v-row class="mt-lg-5">
              <v-btn class="ml-8" color="primary">Сохранить</v-btn>
              <v-btn @click="resetOrder" class="ml-lg-5" color="error">Отменить</v-btn>
            </v-row>
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
      ],
      dragging: false,
    }
  },
  methods: {
    async getTasks() {
      this.courseTasks = await getTasksByCourseId(window.localStorage.getItem("recentlyVisitedCourse"));
    },
    async publicate() {
      const res = await this.$refs.form.validate();
      if (res.valid === true) {
        if (this.courseTasks.tasks.length !== 0) {
          this.courseTasks.tasks.push({
            id: this.courseTasks.tasks.length + 1,
            name: this.newHomeWork.homeworkName
          });
          this.resetForm();
        } else {
          this.courseTasks.tasks[0] = {
            id: 1,
            name: this.newHomeWork.homeworkName
          }
        }
      }
    },
    resetOrder() {
      this.courseTasks.tasks = this.courseTasks.tasks.sort((a, b) => a.id - b.id);
    },
    resetForm() {
      this.$refs.form.resetValidation();
      this.newHomeWork.homeworkName = "";
      this.newHomeWork.homeWorkText = ""
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
  border: 1px solid black;
}

</style>
