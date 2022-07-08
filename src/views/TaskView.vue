<template>
  <div>{{task.taskName}}</div>
</template>

<script>
import {getTaskDataByTaskId} from "@/services/fetchers";
export default {
  name: "TaskView",
  data() {
    return {
      task: {},
    }
  },
  methods: {
    async getTaskData() {
      this.task = await getTaskDataByTaskId(this.$route.query.userId, this.$route.query.courseId, this.$route.query.taskId);
    }
  },
  mounted() {
    console.log(this.$route.query);
    this.getTaskData();
  }
}
</script>

<style scoped>

</style>
