<template>
  <div>
    <HeaderComp title="Создайте новый курс" link="/"/>
    <FooterComp/>
  </div>
</template>

<script>
import HeaderComp from "@/components/HeaderBackRowComp"
import FooterComp from '@/components/FooterComp';

export default {
  name: "CreateCourseView",
  components: {
    FooterComp,
    HeaderComp
  }
}
</script>

<style scoped>

</style>
