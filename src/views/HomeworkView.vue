<template>
  <div>
    <HeaderComp title="Редактирование курса" link="/CourseView"/>
    <div class="container">
      <v-row>
        <v-col cols="3">
          <v-form ref="form" class="pl-2">

                <v-text-field
                    class="ml-10"
                    label="Название домашнего задания"
                    v-model="newHomeWork.homeworkName"
                    :rules="inputHomeworkRules">
                </v-text-field>

                <v-file-input
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
          </v-form>
        </v-col>
        <v-col cols="3">
          <v-form ref="">

                <v-text-field
                    class="ml-10"
                    label="Название домашнего задания"
                    v-model="newHomeWork.homeworkName"
                    :rules="inputHomeworkRules">
                </v-text-field>

                <v-file-input
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
          </v-form>
        </v-col>
        <v-spacer/>
        <v-col cols="5">
            <draggable
                class="v-row"
                item-key="element.id"
                v-model="courseTasks.tasks"
                @start="dragging = true"
                @end="dragging = false">
              <template #item="{element}">
                <div class="dragndrop_item v-col-6 ml-5 mt-5" style="border-radius: 10px">
                  <h3>{{element.moduleName}}</h3>
                  <nested-draggable v-model="element.tasks" item-key="element.taskName" class="list-group" group="people">
                    <template #item="element">
                      <div class="mt-2">
                        <span
                            class="text-blue-accent-4 dragndrop_item_el"
                            v-for="el in element"
                            :key="el.id"
                        >
                          {{el.taskName}}
                        </span>
                      </div>
                    </template>
                  </nested-draggable>
                </div>
              </template>
            </draggable>
            <v-row class="mt-10">
              <v-btn color="primary">Сохранить</v-btn>
              <v-btn @click="resetOrder" color="error" class="ml-5"> Отменить</v-btn>
            </v-row>
        </v-col>
      </v-row>
    </div>

  </div>
</template>

<script>
import HeaderComp from "@/components/HeaderBackRowComp";
import draggable from "vuedraggable";
import nestedDraggable from "vuedraggable"
import {getTasksByCourseId} from "@/services/fetchers";

export default {
  name: "AddHomework",
  components: {
    HeaderComp,
    draggable,
    nestedDraggable
  },
  data() {
    return {
      block: true,
      newHomeWork: {
        homeworkName: "",
        homeWorkText: ""
      },
      courseTasks: {},
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
        this.newHomeWork.homeWorkText = "";
        this.newHomeWork.homeworkName = "";
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
  watch: {
    courseTasks: {
      handler() {
        console.log(this.courseTasks);
      },
      deep: true,
    },
  },
  mounted() {
    this.getTasks();
  }
}
</script>

<style scoped>
.dragndrop_item {
  cursor: move;
  max-width: 300px;
  text-align: center;
  border: 1px solid black;
}

.dragndrop_item_el {
  cursor: pointer;
}


</style>
