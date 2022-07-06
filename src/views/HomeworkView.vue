<template>
  <div>
    <HeaderComp title="Редактирование курса" link="/CourseView"/>
    <div class="container">
      <v-row>
        <!--  TODO: -refactor module adding
                    -create view for tasks -->
        <v-col cols="3">
          <v-row class="justify-center ma-5">
            <h3>Добавление модуля</h3>
          </v-row>
          <v-form ref="module_form" class="pl-2">
                <v-text-field
                    class="ml-10"
                    label="Название нового модуля"
                    v-model="newModule.moduleName"
                >
                </v-text-field>

                <v-textarea class="mt-5 ml-10"
                            label="Описание модуля"
                            v-model="newModule.moduleText"
                />

                <v-row justify="space-around">
                  <v-btn @click="addNewModule" color="primary">Добавить</v-btn>
                  <v-btn color="error">Отменить</v-btn>
                </v-row>
          </v-form>
        </v-col>
        <v-col cols="3">
          <v-row class="justify-center ma-5">
            <h3>Добавление задания</h3>
          </v-row>
          <v-form ref="task_form">

                <v-text-field
                    class="ml-10"
                    label="Название домашнего задания"
                    v-model="newHomeWork.name"
                    :rules="inputHomeworkRules">
                </v-text-field>

                <v-file-input
                    label="Тесты для проверки"
                    v-model="newHomeWork.tests"
                    :rules="filesHomeworkRules">
                >

                </v-file-input>

                <v-file-input
                    class="mt-5"
                    label="Дополнительные файлы задания"
                    v-model="newHomeWork.extraFiles"
                >
                </v-file-input>

                <v-textarea class="mt-5 ml-10"
                            label="Дополнительный текст домашнего задания"
                            v-model="newHomeWork.text"/>

                <v-row justify="space-around">
                  <v-btn @click="publicate" color="primary">Добавить</v-btn>
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
                <div class="dragndrop_item v-col-6 v-col-lg-5 ml-5 mt-5" style="border-radius: 10px">
                  <h3>{{element.moduleName}}</h3>
                  <nested-draggable v-model="element.tasks" item-key="element.taskName" class="list-group" group="people">
                    <template #item="element">
                      <div class="mt-2">
                        <span
                            @click="pushToTask(element)"
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
        name: "",
        tests: [],
        extraFiles: [],
        text: ""
      },
      newModule: {
        moduleName: "",
        moduleText: ""
      },
      courseTasks: {},
      inputHomeworkRules: [
        value => !!value || 'Обязательное поле',
        value => (value && value.length >= 3) || 'Название должно содержать больше 3 символов',
      ],
      filesHomeworkRules: [
        v => !!v || 'File is required',
        v => (v && v.length > 0) || 'File is required',
      ],
      dragging: false,
    }
  },
  methods: {
    async getTasks() {
      this.courseTasks = await getTasksByCourseId(window.localStorage.getItem("recentlyVisitedCourse"));
    },
    async publicate() {
      const res = await this.$refs.task_form.validate();
      if (res.valid === true) {
        if (this.courseTasks.tasks.length !== 0) {
          this.courseTasks.tasks[0].tasks.push({
            taskId: this.countNewIdTask(),
            taskName: this.newHomeWork.name,
            testFiles: this.newHomeWork.tests,
            extraFiles: this.newHomeWork.extraFiles,
            taskText: this.newHomeWork.text
          });
          this.resetForm();
        } else {
          this.courseTasks.tasks[0] = {
            taskId: 1,
            taskName: this.newHomeWork.name
          }
        }
        this.newHomeWork.name = "";
        this.newHomeWork.text = "";
      }
    },
    resetOrder() {
      this.courseTasks.tasks = this.courseTasks.tasks.sort((a, b) => a.id - b.id);
    },
    resetForm() {
      this.$refs.task_form.resetValidation();
      this.newHomeWork.name = "";
      this.newHomeWork.text = ""
    },
    pushToTask(el) {
      const task = el.element;
      console.log(`${task.taskId} ${task.taskName} pushed to task`);
    },
    async addNewModule(){
      console.log(this.courseTasks);
      const isValid = await this.$refs.module_form.validate();
      if (isValid) {
        this.courseTasks.tasks.push({
          taskId: this.countNewIdModule(),
          moduleName: this.newModule.moduleName,
          moduleText: this.newModule.moduleText,
          tasks: []
        });
        this.resetForm();
      }

    },
    countNewIdTask() {
      let newId = 0;
      for (const el  of this.courseTasks.tasks) {
        newId += el.tasks.length;
      }
      return (newId + 1);
    },
    countNewIdModule() {
      let newId = 0;
      for (const el  of this.courseTasks.tasks) {
        newId += el.tasks.length;
      }
      return (newId + 1);
    },
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
