<template>
  <div>
    <HeaderComp/>
    <FooterComp/>
  </div>
</template>

<script>
import HeaderComp from '@/components/HeaderComp';
import FooterComp from '@/components/FooterComp';
export default {
  name: "CourseView",
  components: {
    HeaderComp,
    FooterComp
  }
}
</script>

<style scoped>

</style>