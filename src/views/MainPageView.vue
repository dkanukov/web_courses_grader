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
            <course-card :course-name="element.name" :course-description="element.description"/>
          </v-col>
        </v-row>
      </v-col>

      <v-divider
          vertical
      ></v-divider>

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

export default {
  components: {
    HeaderComp,
    FooterComp,
    CourseCard
  },
  data () {
    return {
      coursesMainPage: [{name: "Test1", description: "description1"}, {name: "Test2", description: "description2"},
        {name: "Test3", description: "description3"}, {name: "Test4", description: "description4"}]
    }
  }
}
</script>

<style scoped>

</style>
