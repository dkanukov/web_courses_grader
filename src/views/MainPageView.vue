<template>
  <div>
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
import {getCoursesMainPage} from "@/services/fetchers"

export default {
  components: {
    HeaderComp,
    FooterComp,
    CourseCard
  },
  data () {
    return {
      coursesMainPage: [],
    }
  },
  async created() {
    try {
      this.coursesMainPage = await getCoursesMainPage();
    }
    catch (e) {
      console.log("server error");
    }
  }
}
</script>

<style scoped>

</style>
