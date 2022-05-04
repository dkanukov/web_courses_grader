<template>
  <div>
    <p>{{message}}</p>
    <HeaderComp/>
    <v-row class="mt-5 ml-5">
      <v-col
          cols = "6"
      >

        <v-row
        >
          <v-col
              v-for="element in coursesMainPage"
              cols = "6"
              :key="element"
          >
            <course-card
                :course-name="element.name"
                :course-status="element.status"
                :courseType="element.type"
            />
          </v-col>
        </v-row>
      </v-col>

      <v-divider vertical=""></v-divider>

      <v-col
          cols = "6"
      >
      </v-col>
    </v-row>
    <FooterComp/>
  </div>
</template>

<script>
import HeaderComp from '@/components/HeaderComp';
import FooterComp from '@/components/FooterComp';
import CourseCard from "@/components/CourseCardComp";
import {fetchMessage} from "@/services/fetchers"

export default {
  components: {
    HeaderComp,
    FooterComp,
    CourseCard
  },
  data () {
    return {
      coursesMainPage: [
        {index: 1, name: "Test1", status: "inAction", type: "open"},
        {index: 2, name: "Test2", status: "closed", type: "open"},
        {index: 3, name: "Test3", status: "inAction", type: "closed"},
        {index: 4, name: "Test4", status: "inDev", type: "closed"}
      ],
      message: ""
    }
  },
  async created() {
    try {
      this.message = await fetchMessage();
    }
    catch (e) {
      this.message = "server error"
    }
  }
}
</script>

<style scoped>

</style>
